<?php

namespace Database\Factories;

use App\Models\Loker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LokerFactory extends Factory
{
    protected $model = Loker::class;

    public function definition()
    {
        return [
            'id' => Str::ulid(),
            'nama_perusahaan' => $this->faker->company,
            'posisi' => $this->faker->jobTitle,
            'deskripsi_perusahaan' => $this->faker->paragraph,
            'pendidikan' => $this->faker->randomElement(['SMA/SMK', 'D1-D3', 'S1/D4']),
            'gender' => $this->faker->randomElement(['Pria', 'Wanita', 'Pria/Wanita']),
            'status_kerja' => $this->faker->randomElement(['Full Time', 'Part Time', 'Freelance', 'Magang']),
            'alamat' => $this->faker->address,
            'panduan_daftar' => $this->faker->sentence(10)
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Loker $loker) {
            \App\Models\Jobdesk::factory()->count(3)->create(['loker_id' => $loker->id]);
            \App\Models\Syarat::factory()->count(3)->create(['loker_id' => $loker->id]);
            \App\Models\Image::factory()->count(2)->create(['loker_id' => $loker->id]);
        });
    }
}
