<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTrackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_trackings', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('user_id');
            $table->boolean('is_accepted');
            $table->dateTime('accepted_at');
            $table->boolean('is_prepared');
            $table->dateTime('prepared_at');
            $table->boolean('is_ofd');
            $table->dateTime('ofd_at');
            $table->boolean('is_waiting');
            $table->dateTime('waiting_at');
            $table->boolean('is_delivered');
            $table->dateTime('delivered_at');
            $table->timestamps();

//            Constraints
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_trackings');
    }
}
