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
        if (auth()->attemptRegister($_POST['username'], $_POST['firstName'],
                        $_POST['lastName'], $_POST['password'], $_POST['cpassword'])) {
            (new Session)->set('user', [
                'username' => $_POST['username'],
                'firstname' => $_POST['firstName'],
                'lastname' => $_POST['lastName'],
                'email' => $_POST['username'] . '@anonmail.com'
            ]);

            $this->redirect('/inbox');
        } else {
            $this->view('register.view.php', [
                'error' => 'Username or password may be Wrong'
            ]);
        }
    }
}
