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
            $table->id();
            $table->integer('name');
            $table->text('aboutMe')->nullable();
            $table->text('jobTitle')->nullable();
            $table->text('company')->nullable();
            $table->text('email');
            $table->text('contactNo')->nullable();
            $table->double('latitude');
            $table->double('longitude');
            $table->text('facebookId')->nullable();
            $table->text('instagramId')->nullable();
            $table->text('password');
            $table->integer('school')->nullable();
            $table->integer('city')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->timestamps();
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
