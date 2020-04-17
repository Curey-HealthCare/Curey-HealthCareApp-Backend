<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePharmaciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacies', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('user_id')->nullable(true);
            $table->decimal('benefit_delivery')->nullable(true);
            $table->decimal('benefit_pharmacy')->nullable(true);
            $table->text('address')->nullable(true);
            $table->timestamps();

//            Constraints
            $table->foreign('user_id')->references('id')->on('users')
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
        Schema::dropIfExists('pharmacies');
    }
}
