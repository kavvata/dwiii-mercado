<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Produto;
use App\Models\UnidadeMedida;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $un = UnidadeMedida::firstOrCreate(['sigla' => 'un.', 'descricao' => 'Unidade']);

        $produtosLimpeza = [
            'Água sanitária',
            'Alvejante',
            'Amaciante',
            'Desinfetante',
            'Detergente',
            'Escovinhas',
            'Esponja de aço',
            'Luvas de borracha',
            'Pano de chão',
            'Pano de prato',
            'Rodo',
            'Sabão em barra',
            'Sabão em pó',
            'Vassoura',
        ];

        $c = Categoria::factory()->create(['nome' => 'Limpeza']);
        foreach ($produtosLimpeza as $produtoNome) {
            $p = Produto::factory()->create(['nome' => $produtoNome, 'categoria_id' => $c->id, 'unidade_medida_id' => $un->id]);
        }

        $produtosHigiene = [
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

        $c = Categoria::factory()->create(['nome' => 'Higiene']);
        foreach ($produtosHigiene as $produtoNome) {
            $p = Produto::factory()->create(['nome' => $produtoNome, 'categoria_id' => $c->id, 'unidade_medida_id' => $un->id]);
        }

        $produtosFerramentas = [
            'Pá',
        ];

        $c = Categoria::factory()->create(['nome' => 'Ferramentas']);
        foreach ($produtosFerramentas as $produtoNome) {
            $p = Produto::factory()->create(['nome' => $produtoNome, 'categoria_id' => $c->id, 'unidade_medida_id' => $un->id]);
        }

        $produtosAlimenticios = [
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
        ];

        $c = Categoria::factory()->create(['nome' => 'Alimenticios']);
        foreach ($produtosAlimenticios as $produtoNome) {
            $p = Produto::factory()->create(['nome' => $produtoNome, 'categoria_id' => $c->id, 'unidade_medida_id' => $un->id]);
        }
    }
}
