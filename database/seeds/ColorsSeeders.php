<?php

use Illuminate\Database\Seeder;

class ColorsSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colors')->insert([
        [
            'id'    => 1,
            'name'=>'Blanco',
        ],[
            'id'    => 2,
            'name'=>'Negro',
        ],
                [
                    'id' => 3,
                    'name' => 'Azul',
                ]
            ]
        );
    }
}
