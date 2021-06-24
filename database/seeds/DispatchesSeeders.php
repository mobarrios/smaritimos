<?php

use Illuminate\Database\Seeder;

class  DispatchesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('dispatches')->insert([
            [
                'id' => 1,
                'date' => date('Y-m-d'),
                'number' => 'RemitoHonda1234',
                'providers_id' => 1,
            ],
            [
                'id' => 2,
                'date' => date('Y-m-d'),
                'number' => 'RemitoYamaha1234',
                'providers_id' => 2,
            ]







        ]);


    }
}
