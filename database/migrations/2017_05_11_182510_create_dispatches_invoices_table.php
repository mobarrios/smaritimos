<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDispatchesInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispatches_invoices', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->date('date');
            $table->string('number');
            $table->double('total',10.2);
            $table->double('sub_total',10.2);
            $table->double('flete',10.2);
            $table->double('seguro',10.2);
            $table->double('iva_total',10.2);
            $table->double('iva_percepcion',10.2);
            $table->double('iibb_percepcion',10.2);

            $table->integer('dispatches_id')->unsigned();
            $table->foreign('dispatches_id')->references('id')->on('dispatches');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dispatches_invoices');
    }
}
