<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bill_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('bill_id');
            $table->string('product_name',255)->nullable(false);
            $table->string('color',50)->nullable(false);
            $table->string('size',255)->nullable(false);
            $table->integer('original_price')->nullable(false);
            $table->integer('discount_amount')->nullable(false);
            $table->integer('discounted_price')->nullable(false);
            $table->integer('total')->nullable(false);
            $table->integer('quantity')->nullable(false);
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('bill_id')->references('id')->on('bills');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bill_details');
    }
};
