<?php

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

it('it registers a new user', function () {
    post(route('register.store'), [
        'name' => 'Test User',
        'email' => 'test@test.com',
        'password' => 'password',
        'password_confirm' => 'password'
    ])
    ->assertRedirect(route('activity.index'));

    assertDatabaseHas('users', [
        'name' => 'Test User',
        'email' => 'test@test.com'
    ]);
});

it('it displays the register form', function () {
    get(route('register.create'))
        ->assertOk()
        ->assertSee('Register');
});
