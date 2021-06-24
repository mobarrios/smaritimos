<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('models', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->string('name');
            $table->string('status');
            $table->double('patentamiento',10.2);
            $table->double('pack_service',10.2);
            $table->integer('min_stock');
            $table->integer('types_id');
            $table->tinyInteger('stock_discount')->default(1);
            

            $table->integer('brands_id')->unsigned()->index();
            $table->foreign('brands_id')->references('id')->on('brands')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('models');

    }
}
