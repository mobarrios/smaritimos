<?php

use Illuminate\Database\Seeder;

class AdditionalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('additionals')->insert([
//            BUDGETS
            [
                'id'    => 1,
                'name'=>'Patentamiento',
            ],[
                'id'    => 2,
                'name'=>'Pack Service',
            ],
            [
                'id'    => 3,
                'name'=>'Seguro',
            ],[
                'id'    => 4,
                'name'=>'Flete',
            ],
            [
                'id'    => 5,
                'name'=>'Formularios',
            ],[
                'id'    => 6,
                'name'=>'Gastos Administrativos',
            ],
            [
                'id'    => 7,
                'name'=>'Cédula',
            ],[
                'id'    => 8,
                'name'=>'Adicional por Sucursal',
            ],
            [
                'id'    => 9,
                'name'=>'LoJack',
            ],[
                'id'    =>10,
                'name'=>'Larga Distancia',
            ],[
                'id'    =>11,
                'name'=>'Alta de Patente',
            ]
        ]);
    }
}
