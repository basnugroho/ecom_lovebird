<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->enum('status', ['not paid', 'paid', 'ready to take', 'sending', 'done']);
            $table->integer('user_id')->unsigned()->index();
            $table->enum('delivery_method', ['take away', 'jne']);
            $table->integer('delivery_service')->nullable();
            $table->bigInteger('delivery_cost')->nullable();
            $table->bigInteger('weight_total')->nullable();
            $table->bigInteger('delivery_cost_total')->nullable();
            $table->string('sub_total');
            $table->string('total');
            $table->string('payment_method');   
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
