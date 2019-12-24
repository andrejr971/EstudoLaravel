<?php

use Illuminate\Database\Seeder;
use App\Categoria;
use Faker\Factory as Faker;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,200) as $index) {
            Categoria::create([
                'nome' => $faker->word
            ]);
        }
    }
}
