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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('name_customer', 255);
            $table->string('name_product', 255);
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('total');
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('id_customer');
            $table->foreign('id_customer')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
