<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_vouchers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('sales_id')->unsigned()->index();
            $table->foreign('sales_id')->references('id')->on('sales');

            $table->integer('vouchers_id')->unsigned()->index();
            $table->foreign('vouchers_id')->references('id')->on('vouchers');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sales_vouchers');
    }
}
