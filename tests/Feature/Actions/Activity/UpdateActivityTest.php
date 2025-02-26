<?php

use App\Actions\Activity\UpdateActivity;
use App\Models\Activity;

use function Pest\Laravel\assertDatabaseHas;

it('updates an activity', function () {
    $activity = Activity::factory()->create();

    $action = new UpdateActivity();

    $action->handle($activity, [
        'title' => 'New Name',
    ]);

    assertDatabaseHas('activities', [
        'id' => $activity->id,
        'title' => 'New Name',
    ]);
});
