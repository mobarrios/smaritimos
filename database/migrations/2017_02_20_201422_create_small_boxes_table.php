<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmallBoxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('small_boxes', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->boolean('entry');
            $table->date('date');
            $table->double('amount',10,2);
            $table->string('detail');

            $table->integer('providers_id')->nullable()->unsigned();
            $table->foreign('providers_id')->references('id')->on('providers');

            $table->integer('types_small_boxes_id')->nullable()->unsigned();
            $table->foreign('types_small_boxes_id')->references('id')->on('types_small_boxes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('small_boxes');
    }
}
