<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('user_id')->unique();
            $table->float('fees');
            $table->float('call-fees');
            $table->text('qualifications');
            $table->unsignedInteger('speciality_id');
            $table->text('address');
            $table->boolean('offers_callup');
            $table->decimal('benefit');
            $table->boolean('cu_benefit');
            $table->timestamps();

//            constraints
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('speciality_id')->references('id')->on('specialities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}