<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->integer('item_amount');
            $table->decimal('tax_amount',  10, 2);
            $table->decimal('total_amount',  10, 2);
            $table->integer('order_status_id');
            $table->timestamps();
            $table->foreign('order_status_id')->references('id')->on('order_statuses');
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
};
