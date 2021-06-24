<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDispatchesItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dispatches_items', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->integer('dispatches_id')->nullable()->unsigned();
            //$table->foreign('dispatches_id')->references('id')->on('dispatches');

            $table->integer('items_id')->nullable()->unsigned();
           // $table->foreign('items_id')->references('id')->on('items');

            $table->integer('purchases_orders_items_id')->nullable()->unsigned();
            //$table->foreign('purchases_orders_items_id')->references('id')->on('purchases_orders_items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dispatches_items');
    }
}
