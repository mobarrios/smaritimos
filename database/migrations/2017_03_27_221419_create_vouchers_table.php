<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->string('tipo');
            $table->string('letra');
            $table->string('concepto');
            $table->string('punto_venta');

            $table->date('fecha');

            $table->double('importe_total', 10, 2);

            $table->string('numero');
            $table->string('cae');
            $table->date('vencimiento_cae');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vouchers');

    }
}
