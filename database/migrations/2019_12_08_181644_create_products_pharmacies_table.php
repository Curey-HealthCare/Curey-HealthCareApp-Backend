<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsPharmaciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_pharmacies', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('product_id')->nullable(true);
            $table->unsignedInteger('pharmacy_id')->nullable(true);
            $table->integer('count')->default('1');
            $table->timestamps();

//            Constraints
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
        Schema::dropIfExists('products_pharmacies');
    }
}
