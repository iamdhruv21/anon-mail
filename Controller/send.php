<?php

use Core\Database;

session_start();

$sender = $_SESSION['email'];
var_dump($sender);
$receiver = $_POST['sendto'];
$title = $_POST['sendtitle'];
$message = $_POST['sendmessage'];


$db = new Database('127.0.0.2', 'anonmail', 'root', '@21Nov2004');

$db->query('Select * from users where email = :email', [
    'email' => $sender
]);

$result = $db->fetch();
$userid= $result['user_id'];

$db->query("insert into mail(sender, receiver, subject, message, send_time, user_id)
values(:sender, :receiver, :subject, :message, now(), {$userid});", [
    'sender' => $sender,
    'receiver' => $receiver,
    'subject' => $title,
    'message' => $message
]);

header('location: /inbox');
die();