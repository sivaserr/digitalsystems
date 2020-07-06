<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('bill_no');
            $table->integer('supplier_id');
            $table->date('date');
            $table->integer('trip_id');
            $table->integer('total_no_of_box');
            $table->integer('no_of_ice_bar');
            $table->integer('per_ice_bar');
            $table->integer('per_packing_price');
            $table->integer('today_box');
            $table->integer('balance_box');
            $table->integer('total_box');
            $table->integer('grass_amount');
            $table->integer('transport_charge');
            $table->integer('icebar_amount');
            $table->integer('packing_charge');
            $table->integer('excess');
            $table->integer('less');
            $table->integer('current_balance');
            $table->integer('pre_balance');
            $table->integer('overall');
            $table->integer('amount_pending');
            $table->integer('box_pending');
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
        Schema::dropIfExists('purchases');
    }
}
