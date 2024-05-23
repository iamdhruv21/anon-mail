<?php

namespace Controller;

class UserController extends Controller
{
    public function profile(): void
    {
        $user = auth()->user();
        $this->view('profile.view.php',[
            'user' => $user
        ]);
    }
}