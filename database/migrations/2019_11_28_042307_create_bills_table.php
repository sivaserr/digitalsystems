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
            $table->string('total_box');
            $table->string('ice_bar');
            $table->string('per_ice_bar');
            $table->string('total_ice_bar');
            $table->string('per_packing_price');
            $table->string('transport_charge');
            $table->string('total_icebar');
            $table->string('less');
            $table->string('packing_charge');
            $table->string('excess');
            $table->string('previous_balance');
            $table->string('overall');
            $table->string('customer_pending');
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
