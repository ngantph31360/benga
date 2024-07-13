<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('variants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('original_price')->nullable(false);
            $table->integer('promotional_price')->default(0);
            $table->enum('is_promotion', ['1', '0'])->nullable(false);
            $table->timestamp('start_discount')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('end_discount')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('stock')->default(0);
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('color_id');
            $table->unsignedInteger('size_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('color_id')->references('id')->on('colors');
            $table->foreign('size_id')->references('id')->on('sizes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variants');
    }
};
