<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('sales_id');
            $table->integer('customer_id');
            $table->integer('product_id');
            $table->string('box');
            $table->string('weight');
            $table->string('net_weight');
            $table->string('loose_box');
            $table->string('loose_kg');
            $table->string('total_weight');
            $table->string('price');
            $table->string('netvalue');
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
        Schema::dropIfExists('sales_products');
    }
}
