<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_number')->unique();
            $table->string('customer_name', 50);
            $table->string('customer_surname', 50);
            $table->string('phone_number', 20);
            $table->mediumInteger('CAP');
            $table->string('street', 255);
            $table->string('city', 100);
            $table->boolean('status')->default(0);
            $table->mediumInteger('final_price');
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
        Schema::dropIfExists('orders');
    }
}
