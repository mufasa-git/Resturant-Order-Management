<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('order_info_id')->unsigned();
            $table->integer('product_id');
            $table->foreign('order_info_id')->references('id')->on('order__infos');
            // $table->foreign('product_id')->references('id')->on('products');
            $table->integer('quantity');
            $table->integer('price_sum');
            $table->integer('tax1');
            $table->integer('tax2');

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
        Schema::dropIfExists('order_lists');
    }
}
