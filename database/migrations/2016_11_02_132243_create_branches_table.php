<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {

            $table->increments('id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->enum('type',['primary','secondary']);
            $table->integer('company_id');
            $table->string('punto_venta');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('branches');

    }
}
