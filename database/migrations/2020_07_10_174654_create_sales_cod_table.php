<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesCodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_cod', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sale_id');
            $table->date('date');
            $table->integer('customer_id');
            $table->integer('bill_amount');
            $table->integer('recived_amount');
            $table->integer('return_box');
            $table->string('note');
            $table->integer('balance');
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
        Schema::dropIfExists('sales_cod');
    }
}
