<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MoveIn>
 */
class MoveInFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'user_id' => 1,
            'fullname'=>fake()->name(),
            'email' => fake()->safeEmail(),
            'phone' =>fake()->phoneNumber(),
            'rental_type' =>fake()->randomElement(['Inquiry', 'Move In']),
            'marketing_desc'=>fake()->randomElement(['Facebook', 'Web Search', 'Poster', 'Referral']),
            'cancelled'=>fake()->date(),
            'date' => fake()->dateTime()

        ];
    }
}
