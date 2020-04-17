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
            $table->unsignedInteger('user_id')->nullable(true);
            $table->unsignedInteger('product_id')->nullable(true);
            $table->boolean('is_available')->default(false);
            $table->dateTime('available_at')->nullable(true);
            $table->unsignedInteger('pharmacy_id')->nullable(true);
            $table->timestamps();

//            Constraints
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('SET NULL')->onUpdate('CASCADE');
            $table->foreign('product_id')->references('id')->on('products')
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
        Schema::dropIfExists('requests');
    }
}
