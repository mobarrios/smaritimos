<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('models_categories', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->integer('models_id')->unsigned()->index();
            $table->foreign('models_id')->references('id')->on('models')->onDelete('cascade');

            $table->integer('categories_id')->unsigned()->index();
            $table->foreign('categories_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('models_categories');
    }
}
