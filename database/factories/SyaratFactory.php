<?php

namespace Database\Factories;

use App\Models\Syarat;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SyaratFactory extends Factory
{
    protected $model = Syarat::class;

    public function definition()
    {
        return [
            'id' => Str::ulid(),
            'syarat' => $this->faker->sentence,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
