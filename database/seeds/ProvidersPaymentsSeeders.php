<?php

use Illuminate\Database\Seeder;

class  ProvidersPaymentsSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('providers_payments')->insert([
            [
                'id' => 1,
                'name' => 'En la Compra',
            ],
            [
                'id' => 2,
                'name' => '30 días',
            ],
            [
                'id' => 3,
                'name' => '60 días',
            ],

        ]);


    }
}
