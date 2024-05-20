<?php

namespace Controller;

use Core\Database;

class InboxController extends Controller
{

    public static function inboxView()
    {
        $db = new Database('127.0.0.2', 'anonmail', 'root', '@21Nov2004');

        $db->query('select * from mail where sender = :sender order by send_time DESC ', [
            'sender' => $_SESSION['email']
        ]);

        $result = $db->fetchAll();

        self::view('show.view.php', [
            'result' => $result
        ]);
    }

    public static function mailView()
    {
        self::view('partials/show.php');
    }

    public static function sendView()
    {
        self::view('sent.view.php');
    }

    public static function profileView()
    {
        self::view('/profile.view.php');
    }


    public static function sendStore()
    {
        $db = new Database('127.0.0.2', 'anonmail', 'root', '@21Nov2004');

        $db->query('Select * from users where email = :email', [
            'email' => $_SESSION['email']
        ]);

        $result = $db->fetch();
        $userid= $result['user_id'];

        $db->query("insert into mail(sender, receiver, subject, message, send_time, user_id)
values(:sender, :receiver, :subject, :message, now(), {$userid});", [
            'sender' => $_SESSION['email'],
            'receiver' => $_POST['sendto'],
            'subject' => $_POST['sendtitle'],
            'message' => $_POST['sendmessage']
        ]);

        self::redirect('/inbox');
    }

    public static function search()
    {
        $search = $_POST['search'];

        $db = new Database('127.0.0.2', 'anonmail', 'root', '@21Nov2004');

        $db->query("select * from mail where user_id in (select user_id from users where firstname = :search or lastname = :search);", [
            'search' => $search
        ]);

        $result = $db->fetchAll();
        self::view('show.view.php', [
            'result' => $result
        ]);
    }
}