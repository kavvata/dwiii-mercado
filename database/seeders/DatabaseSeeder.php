<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\UnidadeMedida;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Cliente::factory()->count(20)->create();

        UnidadeMedida::factory()->create([
            'sigla' => 'un.',
            'descricao' => 'Unidade',
        ]);
        UnidadeMedida::factory()->create([
            'sigla' => 'Kg.',
            'descricao' => 'Kilogramas',
        ]);

        UnidadeMedida::factory()->create([
            'sigla' => 'L.',
            'descricao' => 'Litros',
        ]);

        UnidadeMedida::factory()->create([
            'sigla' => 'ml.',
            'descricao' => 'Mililitros',
        ]);

        $this->call(ProdutoSeeder::class);
    }
}
