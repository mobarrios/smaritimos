<?php

use Illuminate\Database\Seeder;

class PayMethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('pay_methods')->insert([
                [
                    'id'    => 1,
                    'name'=>'Efectivo',

                ]
                ,[
                    'id'    => 2,
                    'name'=>'Cheques',

                ],
                [
                    'id'    => 3,
                    'name'=>'Tarjeta de Crédito',

                ],
                [
                    'id'    => 4,
                    'name'=>'Tarjeta de Débito',

                ],
                [
                    'id'    => 5,
                    'name'=>'Depósito',
                ],
                [
                    'id'    => 6,
                    'name'=>'Transferencia',
                ],
                [
                    'id'    => 7,
                    'name'=>'Créditos',
                ],

            ]
        );

    }
}
