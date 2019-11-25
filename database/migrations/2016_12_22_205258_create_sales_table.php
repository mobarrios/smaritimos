<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->date('date')->nullable();
            $table->date('date_confirm')->nullable();
            $table->string('number')->nullable();
            $table->enum('type',['Presupuesto','Venta'])->default('Presupuesto');

            $table->integer('users_id')->unsigned()->nullable();
            $table->foreign('users_id')->references('id')->on('users');

            $table->integer('clients_id')->unsigned()->nullable();
            $table->foreign('clients_id')->references('id')->on('clients');

            $table->integer('budgets_id')->unsigned()->nullable();
            $table->foreign('budgets_id')->references('id')->on('budgets')->nulleable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sales');
    }
}
