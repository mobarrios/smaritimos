<?php

use Illuminate\Database\Seeder;

class IvaConditionsSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('iva_conditions')->insert([
                [
                    'id' => 1,
                    'name' => 'Responsable Inscripto',

                ], [
                    'id' => 2,
                    'name' => 'Consumidor Final',

                ],
                [
                    'id' => 3,
                    'name' => 'Responsable Monotributo',

                ], [

                    'id' => 4,
                    'name' => 'Responsable Inscripto - Agente de Percepción',

                ], [

                    'id' => 5,
                    'name' => 'Responsable No Inscripto',

                ]]
        );
    }
}
