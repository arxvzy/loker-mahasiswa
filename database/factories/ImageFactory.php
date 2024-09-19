<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'id' => Str::Ulid(),
           'image_link' => $this->faker->randomElement(['01J1YNG1HQM1RK2NPZY8B7D7EE.png', '01J1YN3H4NBSFNJKPFBV2W1KFE.jpg']) 
        ];
    }
}
