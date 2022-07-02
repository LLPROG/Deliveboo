<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();

            // FK user ID
            $table->unsignedBigInteger('user_id');

            $table->string('name', 255);
            $table->text('description');
            $table->text('ingredients');
            $table->string('allergies', 255)->nullable();
            $table->mediumInteger('price')->unsigned();
            $table->boolean('available')->default(1);

            //FK Chain with user_dish (One to Many relationship)
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('dishes');
    }
}

