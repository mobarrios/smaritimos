<?php

use Illuminate\Database\Seeder;

class TypesSmallBoxesPruebaSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('types_small_boxes')->insert([
            [
                'id' => 1,
                'name' => 'Fondo Fijo',

            ], [
                'id' => 2,
                'name' => 'Retiro',
            ]
        ]);


    }
}
