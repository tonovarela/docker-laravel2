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
        Schema::create('planogram', function (Blueprint $table) {
            $table->id();
            $table->integer('item_id');
            $table->string('productCode');
            $table->string('stock');
            $table->string('row');
            $table->string('lane');
            $table->integer('motorType');
            $table->decimal('productPrice',  10, 2);
            $table->integer('stepNum');
            $table->integer('maxStock');
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
        Schema::dropIfExists('planogram');
    }
};
