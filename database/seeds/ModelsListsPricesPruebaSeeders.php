<?php

use Illuminate\Database\Seeder;

class  ModelsListsPricesPruebaSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('models_lists_prices')->insert([
            [
                'id' => 1,
                'number' => 'Honda Junio 2017',
                'status' => 0,
                'providers_id' => 1,
                'updated_at' =>date('Y-m-d H:i:s'),

            ],
            [
                'id' => 2,
                'number' => 'Yamaha Junio 2017',
                'status' => 0,
                'providers_id' => 2,
                'updated_at' =>date('Y-m-d H:i:s'),

            ],
            [
                'id' => 3,
                'number' => 'Bajaj Junio 2017',
                'status' => 0,
                'providers_id' => 3,
                'updated_at' =>date('Y-m-d H:i:s'),

            ],
            [
                'id' => 4,
                'number' => 'Zanella Junio 2017',
                'status' => 0,
                'providers_id' => 4,
                'updated_at' =>date('Y-m-d H:i:s'),

            ],
            [
                'id' => 5,
                'number' => 'Motomel Junio 2017',
                'status' => 0,
                'providers_id' => 5,
                'updated_at' =>date('Y-m-d H:i:s'),

            ],
        ]);


    }
}
