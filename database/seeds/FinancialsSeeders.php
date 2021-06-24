<?php

use Illuminate\Database\Seeder;

class  FinancialsSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('financials')->insert([
            [
                'id' => 1,
                'name' => 'Tarjeta de Crédito  - Visa',
            ],
            [
                'id' => 2,
                'name' => 'Tarjeta de Crédito  - Mastercard',
            ],
            [
                'id' => 3,
                'name' => 'Todo Pago',
            ],
            [
                'id' => 4,
                'name' => 'Mercado Pago',
            ],


        ]);


    }
}
