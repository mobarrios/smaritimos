<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdditionablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additionables', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('additionable_id');
            $table->string('additionable_type');

            $table->double('amount',10,2);

            $table->integer('additionals_id')->unsigned()->index();
            $table->foreign('additionals_id')->references('id')->on('additionals')->onDelete('cascade');

            $table->integer('sales_items_id')->unsigned()->index()->nullable();
            $table->foreign('sales_items_id')->references('id')->on('sales_items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('additionables');
    }
}
