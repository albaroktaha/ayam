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
        Schema::create('distributor_products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name', 255);
            $table->integer('quantity');
            $table->integer('price');
            $table->text('image')->nullable();
            $table->text('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distributor_products');
    }
};