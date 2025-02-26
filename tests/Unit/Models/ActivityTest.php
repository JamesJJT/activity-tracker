<?php

use function Pest\Laravel\actingAs;

it('scope users activities', function () {
    $user = \App\Models\User::factory()->create();
    actingAs($user);

    $activities = \App\Models\Activity::factory(3)->create([
        'user_id' => $user->id
    ]);

    $response = \App\Models\Activity::usersActivities();

    $this->assertEquals($activities[0]->title, $response[0]->title);
    $this->assertEquals($activities[1]->title, $response[1]->title);
    $this->assertEquals($activities[2]->title, $response[2]->title);
});

it('scope user total hours', function () {
    $user = \App\Models\User::factory()->create();
    actingAs($user);

    \App\Models\Activity::factory(3)->create([
        'user_id' => $user->id,
        'duration' => 1
    ]);

    $response = \App\Models\Activity::userTotalHours();

    $this->assertEquals(3, $response);
});
