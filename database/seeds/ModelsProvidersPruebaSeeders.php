<?php

use Illuminate\Database\Seeder;

class ModelsProvidersPruebaSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('models_providers')->insert([
            [
                'id' => 1,
                'models_id' => 1,
                'providers_id' => 1,
            ],
            [
                'id' => 2,
                'models_id' => 2,
                'providers_id' => 1,
            ],
            [
                'id' => 3,
                'models_id' => 3,
                'providers_id' => 1,
            ],
            [
                'id' => 4,
                'models_id' => 4,
                'providers_id' => 2,
            ],
            [
                'id' => 5,
                'models_id' => 5,
                'providers_id' => 2,
            ],
            [
                'id' => 6,
                'models_id' => 6,
                'providers_id' => 2,
            ],
            [
                'id' => 7,
                'models_id' => 7,
                'providers_id' => 3,
            ],
            [
                'id' => 8,
                'models_id' => 8,
                'providers_id' => 3,
            ],
            [
                'id' => 9,
                'models_id' => 9,
                'providers_id' => 3,
            ],

            [
                'id' => 10,
                'models_id' => 10,
                'providers_id' => 3,
            ]

        ]);


    }
}
