<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases_orders', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->date('date');
            $table->string('name');
            $table->integer('status');


            $table->integer('providers_id')->unsigned()->index();
            $table->foreign('providers_id')->references('id')->on('providers');

            $table->integer('users_id')->unsigned()->index();
            $table->foreign('users_id')->references('id')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('purchases_orders');
    }
}
