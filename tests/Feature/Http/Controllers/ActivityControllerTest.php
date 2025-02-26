<?php

use App\Models\Activity;

afterEach(function () {
    \Illuminate\Support\Facades\Auth::logout();
});

it('it displays a list of activities on the dashboard', function () {
    $user = \App\Models\User::factory()->create();

    $activities = \App\Models\Activity::factory(3)->create([
        'user_id' => $user->id
    ]);

    $response = $this->actingAs($user)->get(route('activity.index'));

    $response->assertStatus(200);
    $response->assertViewIs('activity.index');
    $response->assertViewHas('activities');
    $response->assertSee($activities[0]->title);
    $response->assertSee($activities[1]->title);
    $response->assertSee($activities[2]->title);
});

it('it displays a form to create a new activity', function () {
    $user = \App\Models\User::factory()->create();

    $response = $this->actingAs($user)->get(route('activity.create'));

    $response->assertStatus(200);
    $response->assertViewIs('activity.create');
});

it('it creates a new activity', function () {
    $user = \App\Models\User::factory()->create();

    $response = $this->actingAs($user)->post(route('activity.store'), [
        'title' => 'Test Activity',
        'description' => 'This is a test activity',
        'duration' => 1,
    ]);

    $response->assertRedirect(route('activity.index'));

    $this->assertDatabaseHas('activities', [
        'title' => 'Test Activity',
        'description' => 'This is a test activity',
        'duration' => 1,
        'user_id' => $user->id
    ]);
});

it('it allows the user to update an activity', function (){
    $user = \App\Models\User::factory()->create();

    $activity = \App\Models\Activity::factory()->create([
        'user_id' => $user->id
    ]);

    $response = $this->actingAs($user)->put(route('activity.update', $activity), [
        'title' => 'Updated Activity',
        'description' => 'This is an updated activity',
        'duration' => 2,
    ]);

    $response->assertRedirect(route('activity.index'));

    $this->assertDatabaseHas('activities', [
        'title' => 'Updated Activity',
        'description' => 'This is an updated activity',
        'duration' => 2,
        'user_id' => $user->id
    ]);
});

it('it allows the user to delete an activity', function () {
    $user = \App\Models\User::factory()->create();

    $activity = \App\Models\Activity::factory()->create([
        'user_id' => $user->id
    ]);

    $response = $this->actingAs($user)->delete(route('activity.destroy', $activity));

    $response->assertRedirect(route('activity.index'));
    $response->assertDontSee($activity->title);
});

it('it displays a form to edit an activity', function () {
    $user = \App\Models\User::factory()->create();

    $activity = \App\Models\Activity::factory()->create([
        'user_id' => $user->id
    ]);

    $response = $this->actingAs($user)->get(route('activity.edit', $activity));

    $response->assertStatus(200);
    $response->assertViewIs('activity.edit');
    $response->assertViewHas('activity');
    $response->assertSee($activity->title);
});

it('only allows the owner to delete the activity', function () {
    $user = \App\Models\User::factory()->create();
    $activity = \App\Models\Activity::factory()->create(['user_id' => 2]);

    $response = $this->actingAs($user)->delete(route('activity.destroy', $activity));

    $response->assertStatus(403);
});

it('only allows the owner to update the activity', function () {
    $user = \App\Models\User::factory()->create();
    $activity = \App\Models\Activity::factory()->create(['user_id' => 2]);

    $response = $this->actingAs($user)->put(route('activity.update', $activity), [
        'title' => 'Updated Activity',
        'description' => 'This is an updated activity',
        'duration' => 2,
    ]);

    $response->assertStatus(403);
});

it('only allows the owner to view the activity', function () {
    $user = \App\Models\User::factory()->create();
    $activity = \App\Models\Activity::factory()->create(['user_id' => 2]);

    $response = $this->actingAs($user)->get(route('activity.show', $activity));

    $response->assertStatus(403);
});

it('it shows a specific activity', function () {
    $user = \App\Models\User::factory()->create();
    $activity = \App\Models\Activity::factory()->create(['user_id' => $user->id]);

    $response = $this->actingAs($user)->get(route('activity.show', $activity));

    $response->assertStatus(200);
    $response->assertViewIs('activity.show');
    $response->assertViewHas('activity');
    $response->assertSee($activity->title);
});
