<?php

use Illuminate\Database\Seeder;

class  ItemsSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('items')->insert([
            [
                'id' => 1,
                'n_motor' => 'a1s2d3f4g5h6j7k8l',
                'n_cuadro' => 'q1w2e3r4t5y6u7i8o',
                'year' =>  2017,
                'status'=> 1,
                'models_id'=> 1,
                'colors_id' => 1,
            ],
            [
                'id' => 2,
                'n_motor' => 'z1x2c3v4b56n7m8l',
                'n_cuadro' => 'c1v2b3n4m5k77l',
                'year' =>  2017,
                'status'=> 1,
                'models_id'=> 2,
                'colors_id' => 1,
            ],
            [
                'id' => 3,
                'n_motor' => 'c1v2b3n4m5k77l',
                'n_cuadro' => 'a1s2d3f4g5h6j7k8l',
                'year' =>  2017,
                'status'=> 1,
                'models_id'=> 9,
                'colors_id' => 2,
            ],
            [
                'id' => 4,
                'n_motor' => 'z1x2c3v4b56n7m8l',
                'n_cuadro' => 'q1w2e3r4t5y6u7i8o',
                'year' =>  2017,
                'status'=> 1,
                'models_id'=> 10,
                'colors_id' => 2,
            ]







        ]);


    }
}
