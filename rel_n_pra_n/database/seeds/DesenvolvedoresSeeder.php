<?php

use Illuminate\Database\Seeder;

class DesenvolvedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('desenvolvedores')->insert(['nome' => 'André', 'campo' => 'Analista Pleno']);
        DB::table('desenvolvedores')->insert(['nome' => 'Carlos', 'campo' => 'Analista Senior']);
        DB::table('desenvolvedores')->insert(['nome' => 'Paulo', 'campo' => 'Programador']);
    }
}
