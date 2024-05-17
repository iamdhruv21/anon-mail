<?php

use Core\Database;

require "../Core/Database.php";

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

    header('location: /');
} else {

    if($result['password'] === $password){
        session_start();

        $_SESSION['logged'] = true;
        $_SESSION['username'] = $result['username'];
        $_SESSION['firstname'] = $result['firstname'];
        $_SESSION['lastname'] = $result['lastname'];
        $_SESSION['email'] = $result['email'];

        header('location: /inbox');
    }
    else {
        $_SESSION['errors'][] = [
            'password' => 'incorrect credentials'
        ];

        header('location: /');
    }

}
