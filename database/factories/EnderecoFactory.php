<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Endereco>
 */
class EnderecoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cep' => fake('pt_BR')->postcode(),
            'uf' => 'PR',
            'cidade' => fake('pt_BR')->city(),
            'bairro' => fake('pt_BR')->city(),
            'rua' => fake('pt_BR')->streetName(),
            'numero' => fake('pt_BR')->buildingNumber(),
            'complemento' => fake('pt_BR')->paragraph(1),
        ];
    }
}
