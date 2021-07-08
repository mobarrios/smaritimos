<?php

use Illuminate\Database\Seeder;

class BranchSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('branches')->insert(
            [
                [
                    'id' => 1,
                    'name' => 'Casa Central',
                    'company_id' => 1,
                    'punto_venta' => '001',
                    'address'=> 'AV.RICARDO BALBIN 451, SAN MIGUEL',
                ],
                [
                    'id' => 2,
                    'name' => 'Sucursal 1',
                    'company_id' => 1,
                    'punto_venta' => '002',
                    'address'=> 'Ruta 8',
                ],

                /*[
                    'id' => 3,
                    'name' => 'Sucursal 2',
                    'company_id' => 2,
                    'punto_venta' => '001',
                    'address'=> 'AV. RIVADAVIA 18175, MORON ',
                ]*/
                
            ]
        );
    }
}
