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
            $table->string('name', 255)->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('logo', 255)->nullable();
            $table->string('street', 255);
            $table->mediumInteger('cap');
            $table->string('city', 100);
            $table->string('phone_number', 50)->unique();
            $table->string('p_iva', 16)->unique();
            $table->string('slug', 100)->nullable();
            $table->tinyInteger('day_off');
            $table->boolean('closed')->default(0);
            $table->rememberToken();
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
