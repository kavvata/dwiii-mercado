<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake('pt_BR')->name(),
            'cpf' => fake('pt_BR')->unique()->numberBetween(int1: 11111111111, int2: 99999999999),
            'telefone' => fake('pt_BR')->phoneNumber(),
            'email' => fake('pt_BR')->unique()->safeEmail(),
        ];
    }
}
