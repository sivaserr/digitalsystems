<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('bill_id');
            $table->integer('supplier_id');
            $table->integer('product_id');
            $table->integer('box');
            $table->decimal('weight');
            $table->integer('loose_box');
            $table->float('loose_kg');
            $table->integer('net_weight');
            $table->integer('discount');
            $table->integer('total_weight');
            $table->decimal('price');
            $table->decimal('netvalue');
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
        Schema::dropIfExists('purchases_products');
    }
}
