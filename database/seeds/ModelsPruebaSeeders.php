<?php

use Illuminate\Database\Seeder;

class ModelsPruebaSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('models')->insert([
            [
                'id' => 1,
                'name' => 'Modelo A',
                'brands_id' => 1,
                'status' => 1,
                'types_id' => 1,
                
            ], [
                'id' => 2,
                'name' => 'Modelo B',
                'brands_id' => 1,
                'status' => 1,
                'types_id' => 1,

            ],
            [
                'id' => 3,
                'name' => 'Modelo C',
                'brands_id' => 1,
                'status' => 1,
                'types_id' => 1,


            ], [
                'id' => 4,
                'name' => 'Modelo D',
                'brands_id' => 2,
                'status' => 1,
                'types_id' => 1,

            ],
            [
                'id' => 5,
                'name' => 'Modelo E',
                'brands_id' => 2,
                'status' => 1,
                'types_id' => 1,

            ],
            [
                'id' => 6,
                'name' => 'Modelo F',
                'brands_id' => 2,
                'status' => 1,
                'types_id' => 1,

            ],
            [
                'id' => 7,
                'name' => 'Modelo G',
                'brands_id' => 3,
                'status' => 1,
                'types_id' => 1,

            ],
            [
                'id' => 8,
                'name' => 'modelo H',
                'brands_id' => 3,
                'status' => 1,
                'types_id' => 1,

            ],
            [
                'id' => 9,
                'name' => 'Modelo I',
                'brands_id' => 3,
                'status' => 1,
                'types_id' => 1,

            ],
            [
                'id' => 10,
                'name' => 'Modelo J',
                'brands_id' => 3,
                'status' => 1,
                'types_id' => 1,

            ]

        ]);


    }
}
