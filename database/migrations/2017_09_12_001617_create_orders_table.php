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
            $table->enum('status', ['not paid', 'ready to take', 'sending', 'done']);
            $table->integer('user_id')->unsigned()->index();
            $table->enum('delivery_method', ['take away', 'jne']);
            $table->string('delivery_service')->nullable();
            $table->double('delivery_cost', 20, 2)->nullable();
            $table->double('weight_total', 20, 2)->nullable();
            $table->double('delivery_cost_total', 20, 2)->nullable();
            $table->double('sub_total', 20, 2);
            $table->double('total', 20, 2);
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
