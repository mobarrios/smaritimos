<?php

use Illuminate\Database\Seeder;

class BrandsSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert(
            [
                [
                    'id'    => 1,
                    'name'=>'Marca A',
                ],
                [
                    'id'    => 2,
                    'name'=>'Marca B',
                ],
                [
                    'id'    => 3,
                    'name'=>'Marca C',
                ]
            ]
        );
    }
}
