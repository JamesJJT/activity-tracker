<?php

namespace App\Actions\Activity;

use App\Models\Activity;

class CreateNewActivity
{
    public function handle(array $data): void
    {
        Activity::create([
            ...$data,
            'user_id' => auth()->id()
        ]);
    }

}
