<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserSocialMedia;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UserSocialMediaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserSocialMedia::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'type_social_media_id' => 2,
            'content' => json_encode([
                'date_birth' => fake()->date(max: "2022-12-31")
            ]),
        ];
    }
}
