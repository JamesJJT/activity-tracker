<?php

namespace App\Actions\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateNewUser
{

    public function handle(array $data): void
    {
        // Create a new user
        User::create([
            'email' => $data['email'],
            'name' => $data['name'],
            'password' => Hash::make($data['password'])
        ]);

        auth()->attempt($data);
    }
}
