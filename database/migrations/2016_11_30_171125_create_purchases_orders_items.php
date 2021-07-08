<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesOrdersItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases_orders_items', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->integer('quantity');
            $table->double('price',10.2);
            $table->integer('discount');
            $table->integer('status');


            $table->integer('purchases_orders_id')->unsigned()->index();
            $table->foreign('purchases_orders_id')->references('id')->on('purchases_orders');

            $table->integer('models_id')->unsigned()->index();
            $table->foreign('models_id')->references('id')->on('models');

//            $table->integer('colors_id')->unsigned()->index();
//            $table->foreign('colors_id')->references('id')->on('colors');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('purchases_orders_items');
    }
}
