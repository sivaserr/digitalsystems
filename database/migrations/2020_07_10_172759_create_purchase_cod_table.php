<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseCodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_cod', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('bill_id');
            $table->date('date');
            $table->integer('supplier_id');
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
        Schema::dropIfExists('purchase_cod');
    }
}
