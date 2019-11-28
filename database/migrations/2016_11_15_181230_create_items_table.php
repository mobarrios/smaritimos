<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->string('nombre');
            $table->integer('status');
            
            $table->integer('models_id');

            $table->date('f_emision');
            $table->date('f_vencimiento');

            $table->string('cod_proveedor');
            $table->string('n_serie');

            $table->string('emitido_por');
            $table->string('n_certificado');

            $table->string('capacidad');
            $table->integer('items_capacidad_tipo_id');

            $table->integer('company_id');

            $table->text('obs');

           
            //$table->integer('colors_id')->unsigned()->index();
            //$table->foreign('colors_id')->references('id')->on('colors')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('items');
    }
}
