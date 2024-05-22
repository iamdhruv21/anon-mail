<?php

namespace Controller;

use Core\DB;
use Core\Session;

class InboxController extends Controller
{
    public function inbox(): void
    {
        if (!auth()->check()) {
            $this->redirect('/');
        }
        $user = auth()->user();

        DB::query('select user_id from users where username = :username', [
            'username' => $user['username']
        ]);
        $result = DB::fetch();

        DB::query('select * from mail join users on users.user_id = mail.sender_id where receiver_id = :receiver order by send_time DESC', [
            'receiver' => $result['user_id']
        ]);

        $result = DB::fetchAll();
        $this->view('show.view.php', [
            'user' => $user,
            'result' => $result
        ]);
    }

    public function mail()
    {
        DB::query('select * from mail where id = :id', [
            'id' => $_GET['id']
        ]);
        $result = DB::fetch();

        DB::query('select * from users where user_id = :id', [
            'id' => $result['sender_id']
        ]);
        $result2 = DB::fetch();

        DB::query('select * from users where user_id = :id', [
            'id' => $result['receiver_id']
        ]);
        $result3 = DB::fetch();

        DB::query('update mail set seen = 1 where id = :id;', [
            'id' => $_GET['id']
        ]);
        $this->view('partials/show.php', [
            'result' => $result,
            'result2' => $result2,
            'result3' => $result3
        ]);
    }

    public function send()
    {
        $user = auth()->user();
        $this->view('sent.view.php',[
            'user' => $user
        ]);
    }

    public function profile()
    {
        $user = auth()->user();
        $this->view('profile.view.php',[
            'user' => $user
        ]);
    }


    public function sendStore()
    {
        DB::query('Select * from users where username = :username', [
            'username' => substr($_POST['sendto'], 0, stripos($_POST['sendto'], '@', 0))
        ]);
        $result = DB::fetch();

        DB::query('Select * from users where username = :username', [
            'username' => $_SESSION['user']['username']
        ]);
        $result2 = DB::fetch();

        DB::query("insert into mail(sender_id, receiver_id, subject, message, send_time)
                    values(:sender_id, :receiver_id, :subject, :message, now());", [
            'sender_id' => $result2['user_id'],
            'receiver_id' => $result['user_id'],
            'subject' => $_POST['sendtitle'],
            'message' => $_POST['sendmessage']
        ]);

        $this->redirect('/inbox');
    }

    public function search()
    {
        $search = $_POST['search'];
        DB::query("select * from mail join users on users.user_id = mail.receiver_id where receiver_id in (select user_id from users where firstname = :search or lastname = :search);", [
            'search' => $search
        ]);

        $result = DB::fetchAll();
        $user = auth()->user();
        $this->view('show.view.php', [
            'result' => $result,
            'user' => $user
        ]);
    }

    public function destroy()
    {
        Session::destroy();
        header('location: /');
    }
}