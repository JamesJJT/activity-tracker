<?php

use App\Actions\Activity\DeleteActivity;
use App\Models\Activity;

use function Pest\Laravel\assertDatabaseMissing;


it('deletes an activity', function () {
    $activity = Activity::factory()->create();

    $action = new DeleteActivity();

    $action->handle($activity);

    assertDatabaseMissing('activities', [
        'id' => $activity->id,
    ]);
});
