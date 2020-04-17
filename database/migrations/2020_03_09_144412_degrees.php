<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Degrees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('degrees', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('doctor_id')->nullable(true);
            $table->string('degree');
            $table->timestamps();
            // Constraints
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
        Schema::dropIfExists('degrees');
    }
}
