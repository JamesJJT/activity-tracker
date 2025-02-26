<?php

namespace App\Actions\Activity;

use App\Models\Activity;

class DeleteActivity
{
    public function handle(Activity $activity): void
    {
        $activity->delete();
    }
}
