<?php

use App\Models\User;

use function Pest\Laravel\get;
use function Pest\Laravel\post;

it('logs a user in', function () {
    $user = User::factory()->create();

    post(route('login.store'), [
        'email' => $user->email,
        'password' => 'password'
    ])
    ->assertRedirect(route('activity.index'));

    expect(auth()->user()->id)->toBe($user->id);
});

it('logs a user out', function () {
    $user = User::factory()->create();

    post(route('login.store'), [
        'email' => $user->email,
        'password' => 'password'
    ]);

    get(route('logout'))
    ->assertRedirect(route('welcome'));

    expect(auth()->user())->toBeNull();
});

it('displays the login page', function () {
    get(route('login'))
        ->assertOk()
        ->assertSee('Login');
});
