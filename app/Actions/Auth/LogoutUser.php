<?php

namespace App\Actions\Auth;

class LogoutUser
{
    public function handle(): void
    {
        auth()->logout();
    }
}
