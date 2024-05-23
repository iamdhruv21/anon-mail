<?php

namespace Controller;

use Core\DB;
use Core\Session;

class AuthController extends Controller
{
    public function getLogin(): void
    {
        $this->view('index.view.php');
    }

    public function Login(): void
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (auth()->attempt($username, $password)) {
            $this->redirect('/inbox');
        } else {
            $this->view('index.view.php', [
                'error' => 'Username or password is incorrect'
            ]);
        }
    }

    public function getRegister()
    {
        $this->view('register.view.php');
    }

    public function register()
    {
        $data = $_POST;
        $errors = [];
        DB::query('select * from users where username = :username', [
            'username' => $data['username']
        ]);
        $result = DB::fetch();
        if ($result) {
            $errors[] = 'This username already exists in database';
        }

        if ($data['password'] !== $data['cpassword']) {
            $errors[] = 'Confirm Password and password must be same';
        }

        if (count($errors) > 0) {
            $this->view('register.view.php', [
                'error' => $errors[0]
            ]);
        }

        $user = auth()->attemptRegister(
            $data['username'],
            $data['firstName'],
            $data['lastName'],
            $data['password']
        );

        session()->set('user', [
            'id' => $user['id'],
            'username' => $user['username'],
            'firstname' => $user['firstName'],
            'lastname' => $user['lastName'],
            'email' => $user['username'] . '@anonmail.com'
        ]);

        $this->redirect('/inbox');
    }

    public function logout(): void
    {
        Session::destroy();
        header('location: /');
    }
}
