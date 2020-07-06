<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sales_no');
            $table->integer('customer_id');
            $table->integer('date');
            $table->integer('trip_id');
            $table->integer('total_no_of_box');
            $table->integer('today_box');
            $table->integer('balance_box');
            $table->integer('total_box');
            $table->integer('grass_amount');
            $table->integer('transport_charge');
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
        Schema::dropIfExists('sales');
    }
}
