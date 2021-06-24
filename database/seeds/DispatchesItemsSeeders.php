<?php

use Illuminate\Database\Seeder;

class  DispatchesItemsSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('dispatches_items')->insert([
            [
                'id' => 1,
                'purchases_orders_items_id' => 1,
                'dispatches_id' => 1,
                'items_id' =>  1,
            ],
            [
                'id' => 2,
                'purchases_orders_items_id' => 1,
                'dispatches_id' => 1,
                'items_id' => 2,
            ],
            [
                'id' => 3,
                'purchases_orders_items_id' => 2,
                'dispatches_id' => 2,
                'items_id' => 3,

            ],
            [
                'id' => 4,
                'purchases_orders_items_id' => 2,
                'dispatches_id' => 2,
                'items_id' => 4,

            ],
            







        ]);


    }
}
