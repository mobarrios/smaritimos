<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinancialsDuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('financials_dues', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->integer('due');
            $table->double('coef', 10.10);
            $table->integer('porcent');

            $table->string('type');

            $table->integer('financials_id')->unsigned()->nulleable();
            $table->foreign('financials_id')->references('id')->on('financials');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('financials_dues');
    }
}
