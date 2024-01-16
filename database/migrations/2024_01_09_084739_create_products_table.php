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
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('brand_id');
            $table->string('product_name')->unique();
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('discounted_price');
            $table->string('product_image');
            $table->text('description');
            $table->timestamps();

            $table->foreign('type_id')->references('type_id')->on('types')->onDelete('cascade');
            $table->foreign('brand_id')->references('brand_id')->on('brands')->onDelete('cascade');
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
