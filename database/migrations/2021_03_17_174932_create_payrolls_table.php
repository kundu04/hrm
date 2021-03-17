<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->float('gross_salary',2);
            $table->float('basic_salary',2);
            $table->float('house_rent',2);
            $table->float('medical',2);
            $table->float('travel_allowance',2);
            $table->float('daily_allowance',2);
            $table->float('provident_fund',2);
            $table->timestamps();
        });
    }

    /**

     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payrolls');
    }
}
