<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentMethodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->Increments('id');
            $table->unsignedInteger('user_id')->nullable(true);
            $table->string('card_number', 16);
            $table->string('cvc', 3);
            $table->unsignedInteger('expiry_month');
            $table->unsignedInteger('expiry_year');
            $table->string('card_holder_name', 60);
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
        Schema::dropIfExists('payment_methods');
    }
}
