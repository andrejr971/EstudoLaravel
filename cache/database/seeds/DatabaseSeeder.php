<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(ProdutoSeeder::class);
        // $this->call(CategoriaSeeder::class);
        $this->call(ProdutoCategoriaSeeder::class);
    }
}
