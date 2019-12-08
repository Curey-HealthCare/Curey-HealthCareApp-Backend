<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('product_id');
            $table->boolean('is_available');
            $table->dateTime('available_at');
            $table->unsignedInteger('pharmacy_id');
            $table->timestamps();

//            Constraints
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('pharmacy_id')->references('id')->on('pharmacies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
