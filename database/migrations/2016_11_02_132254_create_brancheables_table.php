<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrancheablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brancheables', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->integer('entities_id');
            $table->string('entities_type');

            $table->integer('branches_id')->unsigned()->index();
            $table->foreign('branches_id')->references('id')->on('branches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('brancheables');

    }
}
