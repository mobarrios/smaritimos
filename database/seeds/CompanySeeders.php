<?php

use Illuminate\Database\Seeder;

class CompanySeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company')->insert([
                [
                    'id' => 1,
                    'razon_social' => 'Razon Social A',
                    'nombre_fantasia' => 'N Fantasia A',
                    'direccion' => 'Av. Balbin 486, San Miguel , Buenos Aires',
                    'telefono' => '11 4444 4444',
                    'cuit' => '2311111119',
                    'iva_conditions_id' => 1,
                    'inicio_actividades' => '23-07-93',
                    'ingresos_brutos' => '2311111119'

                ], [
                    'id' => 2,
                    'razon_social' => 'Razon Social B',
                    'nombre_fantasia' => 'N Fantasia B',
                    'direccion' => 'Av. Ricardo Balbin, 422 , SAN MIGUEL, BUENOS AIRES',
                    'telefono' => '1144443222',
                    'cuit' => '3311111119',
                    'iva_conditions_id' => 1,
                    'inicio_actividades' => '01-06-2006',
                    'ingresos_brutos' => '3311111119'

                ]
            ]
        );
    }
}
