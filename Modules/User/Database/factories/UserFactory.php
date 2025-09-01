<?php

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Modules\User\Entities\User;

class UserFactory extends Factory
{
    protected $model = User::class;
    public function definition(): array
    {
        return [
            'fname' => $this->faker->firstName(),
            'lname' => $this->faker->lastName(),
            'mobile' => $this->faker->unique()->numerify('09#########'),
            'mobile_verified_at' => now(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
        ];
    }
}
