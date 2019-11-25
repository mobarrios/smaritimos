<?php

use Illuminate\Database\Seeder;
use App\Entities\Moto\Items;

class ItemsPruebaSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $b = 1;

        $faker = Faker\Factory::create();

        for($a = 0;$a < 5;$a++){
            for($i = 1;$i < 11;$i++){
                $datos = [
                    [
                        'id' => $b,
                        'n_motor' => $faker->regexify('[0-9]{12}'),
                        'n_cuadro' => $faker->regexify('[A-Z0-9]{12}'),
                        'year' => 2017,
                        'status' => 1,
                        'models_id' => $i,
                        'colors_id' => rand(1,3),
                        'created_at' => date('Y-m-d')

                    ]
                ];

                Items::insert($datos);

                Items::find($b)->brancheables()->create(['branches_id' => rand(1,4)]);

                $b++;
            }
        }

    }
}
