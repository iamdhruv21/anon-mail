<?php

namespace Controller;

use Core\DB;

class InboxController extends Controller
{
    public function inbox(): void
    {
        if (!auth()->check()) {
            $this->redirect('/');
        }

        $user = auth()->user();
        DB::query('select * from mail join users on users.email = mail.sender where receiver = :receiver order by send_time DESC', [
            'receiver' => $user['email']
        ]);

        $result = DB::fetchAll();
        $this->view('show.view.php', [
            'user' => $user,
            'result' => $result
        ]);
    }

    public function mail()
    {
        $this->view('partials/show.php');
    }

    public function sendView()
    {
        $this->view('sent.view.php');
    }

    public function profileView()
    {
        $this->view('/profile.view.php');
    }


    public function sendStore()
    {
        $db = new DB('127.0.0.2', 'anonmail', 'root', '@21Nov2004');

        $db->query('Select * from users where email = :email', [
            'email' => $_SESSION['email']
        ]);

        $result = $db->fetch();
        $userid= $result['user_id'];

        $db->query("insert into mail(sender, receiver_id, subject, message, send_time, user_id)
values(:sender, :receiver, :subject, :message, now(), {$userid});", [
            'sender' => $_SESSION['email'],
            'receiver' => $_POST['sendto'],
            'subject' => $_POST['sendtitle'],
            'message' => $_POST['sendmessage']
        ]);

        $this->redirect('/inbox');
    }

    public function search()
    {
        $search = $_POST['search'];

        $db = new DB('127.0.0.2', 'anonmail', 'root', '@21Nov2004');

        $db->query("select * from mail where user_id in (select user_id from users where firstname = :search or lastname = :search);", [
            'search' => $search
        ]);

        $result = $db->fetchAll();
        $this->view('show.view.php', [
            'result' => $result
        ]);
    }
}