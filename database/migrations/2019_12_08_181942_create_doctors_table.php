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
            $table->unsignedInteger('user_id')->nullable(true);
            $table->text('qualifications')->nullable(true);
            $table->unsignedInteger('speciality_id')->nullable(true);
            $table->text('address')->nullable(true);
            $table->boolean('offers_callup')->nullable(true);
            $table->float('fees')->nullable(true);
            $table->float('callup_fees')->nullable(true);
            $table->decimal('benefit')->nullable(true);
            $table->boolean('cu_benefit')->nullable(true);
            $table->timestamps();

//            constraints
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('SET NULL')->onUpdate('CASCADE');

            $table->foreign('speciality_id')->references('id')->on('specialities')
                ->onUpdate('CASCADE')->onDelete('SET NULL');
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
