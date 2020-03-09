<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PresDay extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pres_day', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('prescription_id');
            $table->unsignedInteger('day_id');
            $table->timestamps();
//            Constraints
            $table->foreign('prescription_id')->references('id')->on('prescriptions');
            $table->foreign('day_id')->references('id')->on('days');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pres_day');
    }
}
