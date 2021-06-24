<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZoneTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        $path = database_path().'/dumps/localidades_table.sql';
        DB::unprepared(file_get_contents($path));

        $path = database_path().'/dumps/municipios_table.sql';
        DB::unprepared(file_get_contents($path));

        $path = database_path().'/dumps/provincias_table.sql';
        DB::unprepared(file_get_contents($path));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('localidades');
        Schema::drop('municipios');
        Schema::drop('provincias');
    }
}
