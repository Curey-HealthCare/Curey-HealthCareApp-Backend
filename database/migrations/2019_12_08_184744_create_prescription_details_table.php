<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescription_details', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('prescription_id')->nullable(true);
            $table->unsignedInteger('product_id')->nullable(true);
            $table->text('dosage');
            $table->boolean('per_week');
            $table->timestamps();

//            Constraints
            $table->foreign('prescription_id')->references('id')->on('doctor_prescriptions')
                ->onDelete('SET NULL')->onUpdate('CASCADE');
            $table->foreign('product_id')->references('id')->on('products')
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
        Schema::dropIfExists('prescription_details');
    }
}
