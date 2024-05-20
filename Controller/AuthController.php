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
        $username = $_POST['username'];
        $firstname = $_POST['firstName'];
        $lastname = $_POST['lastName'];

        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        $db = new DB();

        $db->query("Select * from users where username = :username", [
            'username' => $username
        ]);

        $result = $db->fetch();

        if(! $result) {
            if ($password === $cpassword) {
                $db->query("insert into users(username, firstname, lastname, email, password)
                                values(:username, :firstname, :lastname, :email, :password);", [
                    'username' => $username,
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'email' => $username . '@anonmail.com',
                    'password' => $password
                ]);

                (new Session)->set('user', [
                    'logged' => true,
                    'username' => $username,
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'email' => $username . '@anonmail.com'
                ]);

                $this->redirect('/inbox');
            }
        }
        else {
            $this->view('register.view.php', [
                'error' => 'Username or password is incorrect'
            ]);
            die();
        }
    }
}
