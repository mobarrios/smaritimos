<?php

use Illuminate\Database\Seeder;

class ModelsListsPricesItemsPruebaSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('models_lists_prices_items')->insert([
            [
                'id' => 1,
                'price_list' => 39040,
                'price_net' => 38700,
                'price_public' => 0,
                'max_discount' => rand(0,15),
                'obs' => '',
                'models_id' => 1,
                'models_lists_prices_id' => 1,
            ],
            [
                'id' => 2,
                'price_list' => 88580,
                'price_net' => 87500,
                'price_public' => 0,
                'max_discount' => rand(0,15),
                'obs' => '',
                'models_id' => 2,
                'models_lists_prices_id' => 1,
            ],
            [
                'id' => 3,
                'price_list' => 47180,
                'price_net' => 47000,
                'price_public' => 0,
                'max_discount' => rand(0,15),
                'obs' => '',
                'models_id' => 3,
                'models_lists_prices_id' => 2,
            ],
            [
                'id' => 4,
                'price_list' => 54490,
                'price_net' => 54000,
                'price_public' => 0,
                'max_discount' => rand(0,15),
                'obs' => '',
                'models_id' => 4,
                'models_lists_prices_id' => 3,
            ],
            [
                'id' => 5,
                'price_list' => 32440,
                'price_net' => 31900,
                'price_public' => 0,
                'max_discount' => rand(0,15),
                'obs' => '',
                'models_id' => 5,
                'models_lists_prices_id' => 3,
            ],
            [
                'id' => 6,
                'price_list' => 14410,
                'price_net' => 14000,
                'price_public' => 0,
                'max_discount' => rand(0,15),
                'obs' => '',
                'models_id' => 6,
                'models_lists_prices_id' => 4,
            ],
            [
                'id' => 7,
                'price_list' => 18120,
                'price_net' => 87500,
                'price_public' => 0,
                'max_discount' => rand(0,15),
                'obs' => '',
                'models_id' => 7,
                'models_lists_prices_id' => 4,
            ],

            [
                'id' => 8,
                'price_list' => 25540,
                'price_net' => 24850,
                'price_public' => 0,
                'max_discount' => rand(0,15),
                'obs' => '',
                'models_id' => 8,
                'models_lists_prices_id' => 4,
            ],

            [
                'id' => 9,
                'price_list' => 26590,
                'price_net' => 26000,
                'price_public' => 0,
                'max_discount' => rand(0,15),
                'obs' => '',
                'models_id' => 9,
                'models_lists_prices_id' => 5,
            ],

            [
                'id' => 10,
                'price_list' => 20580,
                'price_net' => 20500,
                'price_public' => 0,
                'max_discount' => rand(0,15),
                'obs' => '',
                'models_id' => 10,
                'models_lists_prices_id' => 5,
            ],

        ]);


    }
}
