<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name', "60")->nullable(false);
            $table->float('delivery-fees');
            $table->unsignedInteger('country_id')->nullable(true);
            // $table->foreign('country_id')->references('id')->on('countries');
            $table->timestamps();
        });
        Schema::table('cities', function($table) {
            $table->foreign('country_id')->references('id')->on('countries')
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
        Schema::dropIfExists('cities');
    }
}
