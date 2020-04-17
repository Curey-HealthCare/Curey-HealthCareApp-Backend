<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_ratings', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('appointment_id')->nullable(true);
            $table->text('review')->nullable(true);
            $table->unsignedInteger('behavior');
            $table->unsignedInteger('price');
            $table->unsignedInteger('efficiency');
            $table->timestamps();

//            Constraints
            $table->foreign('appointment_id')->references('id')->on('appointments')
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
        Schema::dropIfExists('doctor_ratings');
    }
}
