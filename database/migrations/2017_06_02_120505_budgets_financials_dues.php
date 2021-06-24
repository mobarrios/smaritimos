<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BudgetsFinancialsDues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budgets_financials_dues', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            
            $table->integer('budgets_id')->unsigned();
            $table->foreign('budgets_id')->references('id')->on('budgets');

            $table->integer('financials_dues_id')->unsigned();
            $table->foreign('financials_dues_id')->references('id')->on('financials_dues');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('budgets_financials_dues');
    }
}
