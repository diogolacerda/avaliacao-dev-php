<?php

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Types')->insert(['name' => "Livro"]);
        DB::table('Types')->insert(['name' => "Dicionário"]);
    }
}
