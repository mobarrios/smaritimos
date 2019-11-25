<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkbooks', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->string('n_chequera');
            $table->string('n_cheque');

            $table->double('amount')->nullable();
            
            $table->date('payment_date')->nullable();
            $table->date('charge_date')->nullable();

            $table->date('due_date')->nullable();

            $table->tinyInteger('type');

            $table->integer('banks_id')->nullable()->unsigned();
            $table->foreign('banks_id')->references('id')->on('banks');

            $table->integer('company_id')->nullable()->unsigned();
            $table->foreign('company_id')->references('id')->on('company');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('checkbooks');
    }
}
