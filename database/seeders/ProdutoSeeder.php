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
        $un = UnidadeMedida::factory()->create([
            'sigla' => 'un',
            'descricao' => 'Unidades',
        ]);
        $kg = UnidadeMedida::factory()->create([
            'sigla' => 'Kg',
            'descricao' => 'Kilogramas',
        ]);
        $mg = UnidadeMedida::factory()->create([
            'sigla' => 'mg',
            'descricao' => 'Miligramas',
        ]);

        $l = UnidadeMedida::factory()->create([
            'sigla' => 'L',
            'descricao' => 'Litros',
        ]);

        $ml = UnidadeMedida::factory()->create([
            'sigla' => 'ml',
            'descricao' => 'Mililitros',
        ]);

        $produtosLimpeza = [
            'Água sanitária' => $l,
            'Alvejante' => $l,
            'Amaciante' => $l,
            'Desinfetante' => $l,
            'Detergente' => $l,
            'Escovinhas' => $un,
            'Esponja de aço' => $un,
            'Luvas de borracha' => $un,
            'Pano de chão' => $un,
            'Pano de prato' => $un,
            'Rodo' => $un,
            'Sabão em barra' => $un,
            'Sabão em pó' => $kg,
            'Vassoura' => $un,
        ];

        $c = Categoria::factory()->create(['nome' => 'Limpeza']);
        foreach ($produtosLimpeza as $produtoNome => $unidade) {
            $p = Produto::factory()->create(['nome' => $produtoNome, 'categoria_id' => $c->id, 'unidade_medida_id' => $unidade->id]);
        }

        $produtosHigiene = [
            'Algodão' => $un,
            'Condicionador' => $un,
            'Cotonete' => $un,
            'Escova de dentes' => $un,
            'Hidratantes' => $un,
            'Lâmina de barbear' => $un,
            'Papel higiênico' => $un,
            'Pasta de dente' => $un,
            'Sabonetes' => $un,
            'Shampoo' => $un,
        ];

        $c = Categoria::factory()->create(['nome' => 'Higiene']);
        foreach ($produtosHigiene as $produtoNome => $unidade) {
            $p = Produto::factory()->create(['nome' => $produtoNome, 'categoria_id' => $c->id, 'unidade_medida_id' => $unidade->id]);
        }

        $produtosFerramentas = [
            'Pá' => $un,
        ];

        $c = Categoria::factory()->create(['nome' => 'Ferramentas']);
        foreach ($produtosFerramentas as $produtoNome => $unidade) {
            $p = Produto::factory()->create(['nome' => $produtoNome, 'categoria_id' => $c->id, 'unidade_medida_id' => $unidade->id]);
        }

        $produtosAlimenticios = [
            'Arroz' => $kg,
            'Azeite' => $l,
            'Bolacha' => $un,
            'Café' => $kg,
            'Chá' => $kg,
            'Feijão' => $kg,
            'Leite' => $l,
            'Macarrão' => $un,
            'Maionese' => $un,
            'Óleo' => $l,
            'Apresuntado' => $kg,
            'Iogurte' => $un,
            'Leite fermentado' => $ml,
            'Manteiga' => $mg,
            'Margarina' => $mg,
            'Mortadela' => $mg,
            'Peito de peru' => $mg,
            'Presunto' => $mg,
            'Queijo' => $mg,
            'Requeijão' => $un,
            'Salame' => $mg,
        ];

        $c = Categoria::factory()->create(['nome' => 'Alimenticios']);
        foreach ($produtosAlimenticios as $produtoNome => $unidade) {
            $p = Produto::factory()->create(['nome' => $produtoNome, 'categoria_id' => $c->id, 'unidade_medida_id' => $unidade->id]);
        }
    }
}
