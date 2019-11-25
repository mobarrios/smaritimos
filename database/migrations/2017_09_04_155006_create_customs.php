<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustoms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customs', function (Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->string('model');
            $table->string('label');
            $table->string('name');
            $table->integer('types_id');
            $table->integer('size');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customs');

    }
}
