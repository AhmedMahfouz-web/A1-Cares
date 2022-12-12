<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    public function run()
{
    User::factory()
            ->count(1)
            ->create();
}
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    // public function definition()
    // {
    //     $this->call([
    //     UserSeeder::class,
    // ]);
    // }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
