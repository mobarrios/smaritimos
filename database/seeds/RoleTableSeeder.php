<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('roles')->insert([
            [
                'id'    => 1,
                'name' => 'root',
                'slug' => 'root',
                'description' => '', // optional
                'level' => 1, // optional, set to 1 by default
            ],[
                'id'    => 2,
                'name' => 'admin',
                'slug' => 'admin',
                'description' => '', // optional
                'level' => 1, // optional, set to 1 by default
            ],[
                'id'    => 3,
                'name' => 'mecanico',
                'slug' => 'mecanico',
                'description' => '', // optional
                'level' => 1, // optional, set to 1 by default
            ]
        ]);

    }
}
