<?php

use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert([
            'nome' => 'camiseta Polo',
            'preco' => 100,
            'estoque' => 4,
            'categoria_id' => 1
        ]);

        DB::table('produtos')->insert([
            'nome' => 'Calça Jeans',
            'preco' => 300,
            'estoque' => 1,
            'categoria_id' => 1
        ]);

        DB::table('produtos')->insert([
            'nome' => 'camiseta Manga Longa',
            'preco' => 500,
            'estoque' => 2,
            'categoria_id' => 1
        ]);

        DB::table('produtos')->insert([
            'nome' => 'PC Games',
            'preco' => 450,
            'estoque' => 3,
            'categoria_id' => 2
        ]);

        DB::table('produtos')->insert([
            'nome' => 'Impressora',
            'preco' => 350,
            'estoque' => 4,
            'categoria_id' => 6
        ]);

        DB::table('produtos')->insert([
            'nome' => 'Mouse',
            'preco' => 150,
            'estoque' => 5,
            'categoria_id' => 6
        ]);

        DB::table('produtos')->insert([
            'nome' => 'Perfume',
            'preco' => 250,
            'estoque' => 6,
            'categoria_id' => 3
        ]);

        DB::table('produtos')->insert([
            'nome' => 'Cama de Casal',
            'preco' => 200,
            'estoque' => 7,
            'categoria_id' => 4
        ]);

        DB::table('produtos')->insert([
            'nome' => 'Moveis',
            'preco' => 4000,
            'estoque' => 8,
            'categoria_id' => 4
        ]);
        
    }
}
