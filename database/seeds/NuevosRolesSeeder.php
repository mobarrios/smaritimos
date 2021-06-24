<?php

use Illuminate\Database\Seeder;

class NuevosRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $armamento = DB::table('roles')->insertGetId(
            [
            'name' => 'Armamento',
            'slug' => 'armamento',
            'description' => '', // optional
            'level' => 1, // optional, set to 1 by default
        ]);

        DB::table('permission_role')->insert([
            'permission_id'=> 138,
            'role_id'=> $armamento,
        ]);

        $sistema = DB::table('roles')->insertGetId(
            [
            'name' => 'Sistemas',
            'slug' => 'sistemas',
            'description' => '', // optional
            'level' => 1, // optional, set to 1 by default
        ]);

        DB::table('permission_role')->insert([
            'permission_id'=> 140,
            'role_id'=> $sistema,
        ]);

        $tecnica = DB::table('roles')->insertGetId(
            [
            'name' => 'Tecnica',
            'slug' => 'tecnica',
            'description' => '', // optional
            'level' => 1, // optional, set to 1 by default
        ]);

        DB::table('permission_role')->insert([
            'permission_id'=> 139,
            'role_id'=> $tecnica,
        ]);

        $salvamento = DB::table('roles')->insertGetId(
            [
            'name' => 'Salvamento',
            'slug' => 'salvamento',
            'description' => '', // optional
            'level' => 1, // optional, set to 1 by default
        ]);

        DB::table('permission_role')->insert([
            'permission_id'=> 142,
            'role_id'=> $salvamento,
        ]);

   
    }
}
