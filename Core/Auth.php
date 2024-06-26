<?php

namespace Core;

class Auth
{
    public function attempt(string $username, string $password): bool
    {
        DB::query('select * from users where username = :username', [
            'username' => $username
        ]);
        $result = DB::fetch();

        if($result) {
            if ($result['password'] === $password) {
                session()->set('user', [
                    'id' => $result['id'],
                    'username' => $result['username'],
                    'firstname' => $result['firstname'],
                    'lastname' => $result['lastname'],
                    'email' => $result['username'].'@anonmail.com'
                ]);
                return true;
            }
        }
        return  false;
    }

    public function attemptRegister($username,$firstname, $lastname, $password): array
    {
        DB::query("insert into users(username, firstname, lastname, password)
            values(:username, :firstname, :lastname, :password);", [
                'username' => $username,
                'firstname' => $firstname,
                'lastname' => $lastname,
                'password' => $password
            ]);

        DB::query('select * from users where username = :username', [
            'username' => $username
        ]);
        return DB::fetch();
    }

    public function check(): bool
    {
        return (bool) session()->get('user');
    }

    public function user()
    {
        return session()->get('user');
    }
}
