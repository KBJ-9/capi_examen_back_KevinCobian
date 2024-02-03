<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\UserDomicilio;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class UserDomicilioFactory extends Factory
{
    protected $model = UserDomicilio::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(), // Esto asocia aleatoriamente con un usuario existente
            'domicilio' => $this->faker->streetAddress,
            'numero_exterior' => $this->faker->buildingNumber,
            'colonia' => $this->faker->citySuffix,
            'cp' => $this->faker->postcode,
            'ciudad' => $this->faker->city,
        ];
    }
}
