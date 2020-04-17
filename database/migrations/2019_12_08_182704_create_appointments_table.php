<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('user_id')->nullable(true);
            $table->unsignedInteger('doctor_id')->nullable(true);
            $table->boolean('is_callup');
            $table->dateTime('appointment_time');
            $table->text('diagnosis')->nullable(true);
            $table->float('duration');
            $table->dateTime('last_checkup')->nullable(true);
            $table->boolean('re_examination')->default(false);
            $table->timestamps();

//            Constraints
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('SET NULL')->onUpdate('CASCADE');
            $table->foreign('doctor_id')->references('id')->on('doctors')
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
        Schema::dropIfExists('appointments');
    }
}
