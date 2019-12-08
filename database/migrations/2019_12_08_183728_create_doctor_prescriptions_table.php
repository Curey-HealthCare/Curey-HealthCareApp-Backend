<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorPrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_prescriptions', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('appointment_id');
            $table->timestamps();

//            Constraints
            $table->foreign('appointment_id')->references('id')->on('appointments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor_prescriptions');
    }
}
