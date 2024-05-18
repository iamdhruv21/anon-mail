<?php

namespace Controller;

use Core\Database;
class HomeController extends Controller
{
    public static function loginView()
    {
        self::view('index.view.php');
    }

    public static function registerView()
    {
        self::view('register.view.php');
    }


    public static function registerStore()
    {

        $username = $_POST['username'];
        $firstname = $_POST['firstName'];
        $lastname = $_POST['lastName'];

        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        $db = new Database('127.0.0.2', 'anonmail', 'root', '@21Nov2004');

        $db->query("Select * from users where username = :username", [
            'username' => $username
        ]);

        $result = $db->fetch();

        if($result) {
            $GLOBALS['errors'][] = [
                'username' => 'Username already exist'
            ];
            var_dump('Username already exist');
            die();
        }
        else {
            if($password === $cpassword){
                $db->query("insert into users(username, firstname, lastname, email, password)
                                values(:username, :firstname, :lastname, :email, :password);", [
                    'username' => $username,
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'email' => $firstname.'@anonmail.com',
                    'password' => $password
                ]);

                session_start();

                $_SESSION['logged'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['firstname'] = $firstname;
                $_SESSION['lastname'] = $lastname;
                $_SESSION['email'] = $firstname.'@anonmail.com';

                self::redirect('/inbox');
            }
            else {
                $GLOBALS['errors'][] = [
                    'password' => 'password does not match'
                ];
                var_dump('password does not match');
                die();
            }
        }
    }

    public static function loginStore()
    {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $db = new Database('127.0.0.2', 'anonmail', 'root', '@21Nov2004');

        $db->query('select * from users where username = :username', [
            'username' => $username
        ]);

        $result = $db->fetch();
        if(! $result) {
            $_SESSION['errors'][] = [
                'username' => 'username not found'
            ];
            var_dump('username not found');
            self::redirect('/');
        } else {
            if($result['password'] === $password){

                $_SESSION['logged'] = true;
                $_SESSION['username'] = $result['username'];
                $_SESSION['firstname'] = $result['firstname'];
                $_SESSION['lastname'] = $result['lastname'];
                $_SESSION['email'] = $result['email'];

                self::redirect('/inbox');
            }
            else {

                $_SESSION['errors'][] = [
                    'password' => 'incorrect credentials'
                ];
                var_dump('password not found');

                self::redirect('/');
            }

        }
    }


}