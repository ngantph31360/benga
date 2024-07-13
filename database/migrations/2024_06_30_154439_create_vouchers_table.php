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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code',25)->unique()->nullable(false);
            $table->string('descriptions',255);
            $table->enum('discount_type', ["percentage","fixed"])->nullable(false);
            $table->integer('discount_value')->default(0);
            $table->integer('min_order_value')->default(0);
            $table->integer('max_discount_amount');
            $table->integer('usage_limit')->nullable(false);
            $table->integer('usage_count')->default(0);
            $table->enum('status', ["active","inactive"])->nullable(false);
            $table->timestamp('start_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
