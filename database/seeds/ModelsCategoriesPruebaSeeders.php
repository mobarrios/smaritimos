<?php

use Illuminate\Database\Seeder;
use App\Entities\Moto\Items;

class ModelsCategoriesPruebaSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         for($i = 1;$i < 7;$i++){
            DB::table('models_categories')->insert([
                 [
                     'id' => $i,
                     'models_id' => $i,
                     'categories_id' => rand(1,3),
                 ]
             ]);

         }

    }
}
