<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesFinancialsDues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_financials_dues', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->double('amount',10.2);
            $table->double('amount_dues',10.2);


            $table->integer('sales_id')->unsigned();
            $table->foreign('sales_id')->references('id')->on('sales');

            $table->integer('financials_dues_id')->unsigned();
            $table->foreign('financials_dues_id')->references('id')->on('financials_dues');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sales_financials_dues');

    }
}
