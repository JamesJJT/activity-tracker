<?php

namespace App\Actions\Auth;

class LoginUser
{
    public function handle(array $data): void
    {
        auth()->attempt($data);
    }
}
