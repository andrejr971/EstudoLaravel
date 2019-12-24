<?php

use Illuminate\Database\Seeder;
use App\Categoria;
use App\Produto;
use App\ProdutoCategoria;
use Faker\Factory as Faker;


class ProdutoCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $produto = Produto::all();
        $categoria = Categoria::all()->pluck('id')->toArray();

        foreach ($produto as $p) {
            $elementos = rand(2, 6);
            for ($i=0; $i < $elementos; $i++) {
                do {
                    $categoria_id = $faker->randomElement($categoria);
                }
                while (ProdutoCategoria::where('produto_id', $p->id)
                ->where('categoria_id', $categoria_id)->exists());

                ProdutoCategoria::create([
                    'produto_id' => $p->id,
                    'categoria_id' => $categoria_id
                ]);

            }
        }
    }
}
