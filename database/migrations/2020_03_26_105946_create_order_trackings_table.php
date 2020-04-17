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
            $table->unsignedInteger('order_id')->nullable(true);
            $table->unsignedInteger('user_id')->nullable(true);
            $table->boolean('is_accepted')->nullable(true);
            $table->dateTime('accepted_at')->nullable(true);
            $table->boolean('is_prepared')->nullable(true);
            $table->dateTime('prepared_at')->nullable(true);
            $table->boolean('is_ofd')->nullable(true);
            $table->dateTime('ofd_at')->nullable(true);
            $table->boolean('is_waiting')->nullable(true);
            $table->dateTime('waiting_at')->nullable(true);
            $table->boolean('is_delivered')->nullable(true);
            $table->dateTime('delivered_at')->nullable(true);
            $table->timestamps();

//            Constraints
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('SET NULL')->onUpdate('CASCADE');
            $table->foreign('order_id')->references('id')->on('orders')
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
        Schema::dropIfExists('order_trackings');
    }
}
