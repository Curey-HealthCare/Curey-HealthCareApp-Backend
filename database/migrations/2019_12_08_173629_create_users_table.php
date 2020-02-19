<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('first_name',"60")
                ->nullable(true);
            $table->string('last_name',"60")
                ->nullable(true);
            $table->string('full_name',"60")
                ->nullable(true);
            $table->string('username',"125")
                ->nullable(true);
            $table->string('email',"125")
                ->nullable(false);
            $table->timestamp('email_verified_at')
                ->nullable(true);
            $table->string('phone',"15")
                ->nullable(true);
            $table->string('password',"125")
                ->nullable(false);
            $table->unsignedInteger('image_id')
                ->nullable(true);
            $table->unsignedInteger('role_id');
            $table->unsignedInteger('gender_id')->nullable(true);
            $table->unsignedInteger('city_id')->nullable(true);
            $table->text('address')->nullable(true);
            $table->boolean('first_login')->default('1');
            $table->rememberToken()->nullable(true);
            $table->timestamps();

//            Constraints
            $table->foreign('image_id')->references('id')->on('images')
                ->onDelete('SET NULL')->onUpdate('CASCADE');
            $table->foreign('role_id')->references('id')->on('user_roles');
            $table->foreign('gender_id')->references('id')->on('genders')
                ->onDelete('SET NULL')->onUpdate('CASCADE');
            $table->foreign('city_id')->references('id')->on('cities')
                ->onDelete('SET NULL')->onUpdate('CASCADE');
            $table->unique (['email', 'role_id']);
        });

        Schema::table('users', function ($table) {
//            API Token
            $table->string('api_token',"125")->after('password')->unique()
                ->nullable(true)->default(null);
            $table->boolean('is_confirmed')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
