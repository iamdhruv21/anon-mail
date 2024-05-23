<?php

namespace Controller;

use Core\DB;

class MailController extends Controller
{
    public function compose()
    {
        $user = auth()->user();
        $this->view('sent.view.php',[
            'user' => $user
        ]);
    }

    public function inbox(): void
    {
        if (!auth()->check()) {
            $this->redirect('/');
        }
        $user = auth()->user();
        $search = null;
        if (isset($_GET['q'])) {
            $search = $_GET['q'];
        }

        $query = 'select mail.id, subject, message, send_time, seen, username, firstname, lastname from mail join users on users.id = mail.sender_id where receiver_id = :receiver ';
        if (!is_null($search)) {
            $query .= "and users.firstname like :search or users.lastname like :search ";
        }
        $query .= 'order by send_time DESC';
        $params = ['receiver' => $user['id']];
        if (!is_null($search)) {
            $params['search'] = "%{$search}%";
        }

        DB::query($query, $params);
        $result = DB::fetchAll();

        $this->view('show.view.php', [
            'user' => $user,
            'result' => $result
        ]);
    }

    public function show(): void
    {
        DB::query('select * from mail where id = :id', [
            'id' => $_GET['id']
        ]);
        $result = DB::fetch();

        DB::query('select * from users where id = :id', [
            'id' => $result['sender_id']
        ]);
        $result2 = DB::fetch();

        DB::query('select * from users where id = :id', [
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

    public function sendMail()
    {
        DB::query('Select * from users where username = :username', [
            'username' => substr($_POST['sendto'], 0, stripos($_POST['sendto'], '@', 0))
        ]);
        $result = DB::fetch();

        DB::query("insert into mail(sender_id, receiver_id, subject, message, send_time)
                    values(:sender_id, :receiver_id, :subject, :message, time());", [
            'sender_id' => auth()->user()['id'],
            'receiver_id' => $result['id'],
            'subject' => $_POST['sendtitle'],
            'message' => $_POST['sendmessage']
        ]);

        $this->redirect('/inbox');
    }
}