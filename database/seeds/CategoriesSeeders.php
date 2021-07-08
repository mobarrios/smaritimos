<?php

use Illuminate\Database\Seeder;

class CategoriesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'id'    => 1,
                'name'=>'Categoria A',
            ],[
                'id'    => 2,
                'name'=>'Categoria B',
            ],
            [
                'id'    => 3,
                'name'=>'Categoria C',
            ]

        ]);
    }
}
