<?php

use Illuminate\Database\Seeder;

class  PurchasesOrdersSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('purchases_orders')->insert([
            [
                'id' => 1,
                'date' => date('Y-m-d'),
                'name' => 'Pedido Honda',
                'providers_id' => 1,
                'status' => 3,
                'users_id' => 1,
            ],
            [
                'id' => 2,
                'date' => date('Y-m-d'),
                'name' => 'Pedido Yamaha',
                'providers_id' => 2,
                'status' => 3,
                'users_id' => 1,


            ],

        ]);


    }
}
