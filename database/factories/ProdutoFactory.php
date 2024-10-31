<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Produto>
 */
class ProdutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $listaNomeProdutos = [
            'Arroz',
            'Azeite',
            'Bolacha',
            'Café',
            'Chá',
            'Feijão',
            'Leite',
            'Macarrão',
            'Maionese',
            'Óleo',
            'Apresuntado',
            'Iogurte',
            'Leite fermentado',
            'Manteiga',
            'Margarina',
            'Mortadela',
            'Peito de peru',
            'Presunto',
            'Queijo',
            'Requeijão',
            'Salame',
            'Água sanitária',
            'Alvejante',
            'Amaciante',
            'Desinfetante',
            'Detergente',
            'Escovinhas',
            'Esponja de aço',
            'Luvas de borracha',
            'Pá',
            'Pano de chão',
            'Pano de prato',
            'Rodo',
            'Sabão em barra',
            'Sabão em pó',
            'Vassoura',
            'Absorvente',
            'Algodão',
            'Condicionador',
            'Cotonete',
            'Escova de dentes',
            'Hidratantes',
            'Lâmina de barbear',
            'Papel higiênico',
            'Pasta de dente',
            'Sabonetes',
            'Shampoo',
        ];

        return [
            'nome' => $listaNomeProdutos[fake()->unique()->numberBetween(int1: 0, int2: count($listaNomeProdutos) - 1)],
            'descricao' => fake()->sentence(10),
            'medida' => fake()->word(),
            'quantidade' => fake()->numberBetween(int1: 1, int2: 50),
            'preco' => fake()->randomFloat(max: 50),
        ];
    }
}
