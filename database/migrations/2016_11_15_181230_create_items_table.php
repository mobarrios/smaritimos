<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->string('name');
            $table->integer('status');
            
            $table->integer('models_id')->unsigned()->index();
            $table->foreign('models_id')->references('id')->on('models')->onDelete('cascade');

           
            //$table->integer('colors_id')->unsigned()->index();
            //$table->foreign('colors_id')->references('id')->on('colors')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('items');
    }
}
