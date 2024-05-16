<?php

use Core\Database;

require "../Core/Database.php";

$username = $_POST['username'];
$firstname = $_POST['firstName'];
$lastname = $_POST['lastName'];

$password = $_POST['password'];
$cpassword = $_POST['cpassword'];

$db = new Database('127.0.0.2', 'anonmail', 'root', '@21Nov2004');

$result = $db->query("Select * from users where username = :username", [
    'username' => $username
]);

if(count($result) > 0) {
    $errors[] = [
        'username' => 'Username already exist'
    ];
}


