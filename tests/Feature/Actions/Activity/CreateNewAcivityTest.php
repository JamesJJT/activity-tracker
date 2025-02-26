<?php

use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;

it('creates a new activity', function () {
    $user = \App\Models\User::factory()->create();

    actingAs($user);
    $action = new \App\Actions\Activity\CreateNewActivity();

    $action->handle([
        'title' => 'Test Activity',
        'description' => 'This is a test activity',
        'duration' => 1,
        'user_id' => $user->id
    ]);

    assertDatabaseHas('activities', [
        'title' => 'Test Activity',
        'description' => 'This is a test activity',
        'duration' => 1,
        'user_id' => $user->id
    ]);

});
