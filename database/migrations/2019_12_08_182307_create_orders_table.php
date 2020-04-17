<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('user_id')->nullable(true);
            $table->unsignedInteger('pharmacy_id')->nullable(true);
            $table->string('address');
            $table->float('discount')->default('0');
            $table->boolean('delivery_type');
            $table->timestamps();

//            Constraints
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('SET NULL')->onUpdate('CASCADE');
            $table->foreign('pharmacy_id')->references('id')->on('pharmacies')
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
        Schema::dropIfExists('orders');
    }
}
