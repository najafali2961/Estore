<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     *
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('category');
            $table->string('sub_category');
            $table->string('brand');
            $table->string('unit');
            $table->string('sku')->unique();
            $table->integer('minimum_qty');
            $table->text('quantity_description');
            $table->decimal('tax', 5, 2);
            $table->string('discount_type');
            $table->decimal('price', 10, 2);
            $table->string('status');
            $table->string('product_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
