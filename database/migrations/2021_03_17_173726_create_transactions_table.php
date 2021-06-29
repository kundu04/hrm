<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id',15)->unique();
            $table->string('client');
            $table->unsignedBigInteger('transaction_head_id');
            $table->foreign('transaction_head_id')->references('id')->on('transaction_heads');
            $table->enum('type',['Income','Expense']);
            $table->text('description');
            $table->date('date');
            $table->float('amount',10,2);
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
        Schema::dropIfExists('transactions');
    }
}
