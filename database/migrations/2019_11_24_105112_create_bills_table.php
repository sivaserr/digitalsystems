<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigIncrements('id');
            $table->string('bill_no');
            $table->string('customer_id');
            $table->string('date');
            $table->string('product_id');
            $table->string('box');
            $table->string('kg');
            $table->string('net_weight');
            $table->string('per_kg_price');
            $table->string('actual_price');
            $table->string('discount');
            $table->string('discount_price');
            $table->string('nat_value');
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
        Schema::dropIfExists('bills');
    }
}
