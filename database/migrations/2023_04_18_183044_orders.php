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
            $table->integer('id')->primary();
            $table->integer('transaction_id')->nullable();
            $table->integer('item_amount');
            $table->decimal('tax_amount',  10, 2);
            $table->decimal('total_amount',  10, 2);
            $table->string('order_status');
            $table->string('payment_status')->nullable();
            $table->string('dispense_status')->nullable();
            $table->timestamps();
            //$table->foreign('order_status_id')->references('id')->on('order_statuses');
        });
        // lame way to start cart/order numbers at 500
        DB::statement("insert into orders (id, tax_amount,total_amount,item_amount,order_status) values (499,0,0,0,'init');");

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
