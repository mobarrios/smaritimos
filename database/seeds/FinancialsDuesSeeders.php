<?php

use Illuminate\Database\Seeder;

class  FinancialsDuesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('financials_dues')->insert([
            [
                'id' => 1,
                'financials_id'=> 1 ,
                'due' =>  '2' ,
                'coef' =>  '1.002422' ,
            ],
            [
                'id' => 2,
                'financials_id'=> 1 ,
                'due' =>  '6' ,
                'coef' =>  '1.022422' ,
            ],
            [
                'id' => 3,
                'financials_id'=> 1 ,
                'due' =>  '12' ,
                'coef' =>  '1.34556' ,
            ],
            [
                'id' => 4,
                'financials_id'=> 2 ,
                'due' =>  '2' ,
                'coef' =>  '1.22422' ,
            ],
            [
                'id' => 5,
                'financials_id'=> 2 ,
                'due' =>  '6' ,
                'coef' =>  '1.2122422' ,
            ],
            [
                'id' => 6,
                'financials_id'=> 2 ,
                'due' =>  '12' ,
                'coef' =>  '1.344556' ,
            ],
            [
                'id' => 7,
                'financials_id'=> 3 ,
                'due' =>  '1' ,
                'coef' =>  '1.3123' ,
            ],
            [
                'id' => 8,
                'financials_id'=> 3 ,
                'due' =>  '12' ,
                'coef' =>  '1.3232' ,
            ],
            [
                'id' => 9,
                'financials_id'=> 4 ,
                'due' =>  '12' ,
                'coef' =>  '0' ,
            ],





        ]);


    }
}
