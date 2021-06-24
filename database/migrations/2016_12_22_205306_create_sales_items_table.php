<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_items', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->double('price_actual',10.2);
            $table->integer('cant')->default(1);

            
            $table->integer('sales_id')->unsigned()->nulleable();
            $table->foreign('sales_id')->references('id')->on('sales');

            $table->integer('items_id')->unsigned()->nulleable();
            $table->foreign('items_id')->references('id')->on('items');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sales_items');
    }
}
