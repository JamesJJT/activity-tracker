<?php

namespace Database\Factories;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ActivityFactory extends Factory
{
    protected $model = Activity::class;

    public function definition(): array
    {
        return [
            'created_at'  => Carbon::now(),
            'updated_at'  => Carbon::now(),
            'title'       => $this->faker->word(),
            'description' => $this->faker->text(),
            'duration'    => $this->faker->randomFloat(),

            'user_id' => User::factory(),
        ];
    }
}
