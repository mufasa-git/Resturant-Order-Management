<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order__infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tax_num');
            $table->string('client_name');
            $table->integer('table_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->foreign('table_id')->references('id')->on('tables');
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('order__infos');
    }
}
