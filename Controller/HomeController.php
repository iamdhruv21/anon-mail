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
            self::view('register.view.php', [
                'error' => 'Username or password is incorrect'
            ]);
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

                SessionController::put([
                    'logged' => true,
                    'username' => $username,
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'email' => $firstname.'@anonmail.com'
                ]);

                self::redirect('/inbox');
            }
            else {
                self::view('register.view.php', [
                    'error' => 'Username or password is incorrect'
                ]);
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
            self::view('index.view.php', [
                'error' => 'Username or password is incorrect'
            ]);
        } else {
            if($result['password'] === $password){
                SessionController::put([
                    'logged' => true,
                    'username' => $result['username'],
                    'firstname' => $result['firstname'],
                    'lastname' => $result['lastname'],
                    'email' => $result['email']
                ]);

                self::redirect('/inbox');
            }
            else {
                self::view('index.view.php', [
                    'error' => 'Username or password is incorrect'
                ]);
            }

        }
    }


}