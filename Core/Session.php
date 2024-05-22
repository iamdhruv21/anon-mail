<?php

namespace Core;

class Session
{
    public function destroy(): void
    {
        session_unset();
        session_destroy();
        header('location: /');
    }

    public function get($key)
    {
        return $_SESSION[$key] ?? null;
    }

    public function set($key, array|string $value = []): void
    {
        $_SESSION[$key] = $value;
    }
}