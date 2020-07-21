<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfitorLossesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profitor_losses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('trip_id');
            $table->integer('purchase_amount');
            $table->integer('total_expense');
            $table->integer('sale_amount');
            $table->integer('profit');
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
        Schema::dropIfExists('profitor_losses');
    }
}
