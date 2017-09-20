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
            $table->string('receipt')->nullable();
            $table->integer('user_id')->unsigned()->index();
            $table->enum('delivery_method', ['take away', 'jne']);
            $table->integer('delivery_service')->nullable();
            $table->bigInteger('delivery_cost')->nullable();
            $table->string('total');
            $table->enum('payment_method', ['not paid', 'cash', 'BCA']);
            
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            //$table->foreign('delivery_id')->references('id')->on('deliveries');
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
