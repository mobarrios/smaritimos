<?php

use Illuminate\Database\Seeder;

class BrancheablesSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brancheables')->insert([
                [
                    'entities_id' => 1,
                    'entities_type' => 'App\Entities\Configs\User',
                    'branches_id' => '1',
                ],[
                    'entities_id' => 1,
                    'entities_type' => 'App\Entities\Configs\User',
                    'branches_id' => '2',
                ],[
                    'entities_id' => 2,
                    'entities_type' => 'App\Entities\Configs\User',
                    'branches_id' => '1',
                ]
                
            ]
        );
    }
}
