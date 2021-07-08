<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->string('razon_social');
            $table->string('nombre_fantasia');
            $table->string('direccion');
            $table->string('telefono');
            $table->string('cuit');
            $table->integer('iva_conditions_id');
            $table->string('inicio_actividades');
            $table->string('ingresos_brutos');
            $table->tinyInteger('fe');



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('company');
    }
}
