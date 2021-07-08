<?php

use Illuminate\Database\Seeder;

class BanksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('banks')->insert([
                [
                    'id'    => 1,
                    'name'=>'BNA',

                ]
                ,[
                    'id'    => 2,
                    'name'=>'Banco Santander Rio',

                ],
                [
                    'id'    => 3,
                    'name'=>'ICBC',

                ],
                [
                    'id'    => 4,
                    'name'=>'Banco Galicia',

                ],
                [
                    'id'    => 5,
                    'name'=>'Banco Hipotecario',
                ],
                [
                    'id'    => 6,
                    'name'=>'Banco Francés',
                ],
                [
                    'id'    => 7,
                    'name'=>'Banco Macro',
                ],
                [
                    'id'    => 8,
                    'name'=>'Banco Provincia de Buenos Aires',
                ],

            ]
        );

    }
}
