<?php

use Core\Database;

require "../Core/Database.php";

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
            'email' => $firstname.'@emailcom',
            'password' => $password
        ]);
        $result = $db->fetch();

        session_start();

        $_SESSION['logged'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $_SESSION['email'] = $firstname.'@emailcom';

        header('location: /inbox');
        die();

    }
    else {
        $GLOBALS['errors'][] = [
            'password' => 'password does not match'
        ];
        var_dump('password does not match');
        die();
    }
}


