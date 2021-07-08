<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->date('date');
            $table->double('amount',10.2);

            $table->integer('banks_id')->nullable();
            $table->string('number')->nullable();

            $table->date('check_date')->nullable();
            $table->date('check_pay_date')->nullable();
            $table->integer('check_types_id')->nullable();

            $table->string('term')->nullable();

            $table->date('transf_date')->nullable();
            $table->integer('financials_id')->nullable();

            $table->tinyInteger('status')->unsigned()->nullable();

            $table->integer('sales_id')->unsigned()->nullable();
            $table->integer('pay_methods_id')->unsigned()->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('payments');
    }
}
