<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pegawai>
 */
class PegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid(),
            'nama' => $this->faker->name(),
            'user_id' => 3,
            'nip' => $this->faker->randomNumber(5, true),
            'jabatan' => $this->faker->jobTitle(),
        ];
    }
}
