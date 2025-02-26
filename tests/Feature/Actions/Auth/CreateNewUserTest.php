<?php

use App\Actions\Auth\CreateNewUser;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use function Pest\Laravel\assertDatabaseHas;
use function PHPUnit\Framework\assertTrue;

it('it creates a new user and logs them in', function () {
    $action = new CreateNewUser();

    $action->handle([
        'email' => 'test@test.com',
        'name' => 'Test User',
        'password' => 'password1234'
    ]);

    assertDatabaseHas('users', [
        'email' => 'test@test.com',
        'name' => 'Test User'
    ]);

    assertTrue(Hash::check('password1234', User::first()->password));

    assertTrue(auth()->check());
});
