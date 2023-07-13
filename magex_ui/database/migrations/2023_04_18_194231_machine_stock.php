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
        Schema::create('machine_stock', function (Blueprint $table) {
            $table->string('upc');
            $table->integer('current_stock');
            $table->integer('max_stock');
            $table->string('motor');
            $table->integer('stock');
            $table->integer('row');
            $table->integer('lane');
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
        Schema::dropIfExists('machine_stock');
    }
};
