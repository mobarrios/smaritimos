<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomizables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customizables', function (Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->string('customizables_type');
            $table->integer('customizables_id')->unsigned();
            $table->string('value');

            $table->integer('customs_id')->unsigned();
            $table->foreign('customs_id')->references('id')->on('customs');

            $table->integer('customs_lists_id')->unsigned();
            $table->foreign('customs_lists_id')->references('id')->on('customs_lists');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customizables');

    }
}
