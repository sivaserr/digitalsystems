<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaidDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paid_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bill_id');
            $table->date('date');
            $table->integer('supplier_id');
            $table->string('paid_amount');
            $table->string('return_box');
            $table->string('note');
            $table->string('bank_id');
            $table->string('transfer_type');
            $table->string('ref_no');
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
        Schema::dropIfExists('paid_details');
    }
}
