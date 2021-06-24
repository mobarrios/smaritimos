<?php

use Illuminate\Database\Seeder;

class  PurchasesOrdersItemsSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('purchases_orders_items')->insert([
            [
                'id' => 1,
                'quantity' => 2,
                'price' => 2500,
                'purchases_orders_id' => 1,
                'models_id' => 1,
                'colors_id' => 1,
            ],
            [
                'id' => 2,
                'quantity' => 2,
                'price' => 2300,
                'purchases_orders_id' => 1,
                'models_id' => 2,
                'colors_id' => 2,
            ],
            [
                'id' => 3,
                'quantity' => 2,
                'price' => 4500,
                'purchases_orders_id' => 2,
                'models_id' => 9,
                'colors_id' => 1,
            ],
            [
                'id' => 4,
                'quantity' => 2,
                'price' => 5300,
                'purchases_orders_id' => 2,
                'models_id' => 10,
                'colors_id' => 2,
            ],

        ]);


    }
}
