<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePharmacyRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacy_ratings', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('order_id')->nullable(true);
            $table->text('review')->nullable(true);
            $table->unsignedInteger('rating');
            $table->timestamps();

//            Constraints
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
        Schema::dropIfExists('pharmacy_ratings');
    }
}
