<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budgets', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->date('date');

            $table->integer('users_id')->nullable();
            //$table->foreign('users_id')->references('id')->on('users');
            
            $table->integer('clients_id')->unsigned()->nullable();
            $table->foreign('clients_id')->references('id')->on('clients');

            $table->integer('seguro')->nullable();
            $table->integer('flete')->nullable();
            $table->integer('formularios')->nullable();
            $table->integer('gastos_administrativos')->nullable();
            $table->integer('descuento')->nullable();
            $table->integer('anticipo')->nullable();
            $table->integer('importe_cuota')->nullable();
            $table->integer('a_financiar')->nullable();
            $table->integer('total')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('budgets');
    }
}
