<?php

namespace Database\Factories;

use App\Models\Jobdesk;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class JobdeskFactory extends Factory
{
    protected $model = Jobdesk::class;

    public function definition()
    {
        return [
            'id' => Str::ulid(),
            'jobdesk' => $this->faker->sentence,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
