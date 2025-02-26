<?php

use App\Models\Activity;
use App\Models\User;
use App\Policies\ActivityPolicy;


beforeEach(function () {
    $this->user = User::factory()->create();
    $this->activity = Activity::factory()->create(['user_id' => $this->user->id]);
    $this->policy = new ActivityPolicy();
});



