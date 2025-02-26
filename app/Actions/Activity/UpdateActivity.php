<?php

namespace App\Actions\Activity;

use App\Models\Activity;

class UpdateActivity
{
    public function handle(Activity $activity,array $data): void
    {
        $activity->update([
            ...$data
        ]);
    }
}
