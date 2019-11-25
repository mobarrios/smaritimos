<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id'    => 1,
                'user_name'=>'root',
                'name'=>'root',
                'email'=>'root@admin.com',
                'password'=> \Illuminate\Support\Facades\Hash::make('yuna'),
                'branches_active_id' => 1

            ],[
                'id'    => 2,
                'user_name'=>'admin',
                'name'=>'admin',
                'email'=>'admin@admin.com',
                'password'=> \Illuminate\Support\Facades\Hash::make('1234'),
                'branches_active_id' => 1
            ]]);
    }
}
