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
        Schema::create('order_details', function (Blueprint $table) {
            $table->integer('order_id');
            $table->string('item_id');
            $table->string('product_name');
            $table->string('upc')->nullable();
            $table->integer('quantity');
            $table->decimal('soldPrice', 10, 2);
            $table->decimal('tax_amount', 10, 2);
            $table->string('product')->nullable();;
            $table->string('prodType')->nullable();;
            $table->decimal('discount', 10, 2)->nullable();;
            $table->string('referTo')->nullable();;
            $table->string('picture')->nullable();;
            $table->decimal('total_amount', 10, 2);
            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade')->onUpdate('cascade');;
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
};
