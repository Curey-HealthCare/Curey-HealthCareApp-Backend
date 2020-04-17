<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('order_id')->nullable(true);
            $table->unsignedInteger('product_id')->nullable(true);
            $table->unsignedInteger('amount')->default('1');
            $table->timestamps();

//            Constraints
            $table->foreign('order_id')->references('id')->on('orders')
                ->onDelete('SET NULL')->onUpdate('CASCADE');
            $table->foreign('product_id')->references('id')->on('products_pharmacies')
                ->onDelete('SET NULL')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
