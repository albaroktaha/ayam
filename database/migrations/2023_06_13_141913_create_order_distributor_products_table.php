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
        Schema::create('order_distributor_products', function (Blueprint $table) {
            $table->id();
            $table->string('name_product', 255);
            $table->integer('quantity');
            $table->integer('price');
            $table->integer('total');
            $table->text('notes')->nullable();
            $table->enum('status', ['Completed', 'Processing', 'Canceled']);
            $table->timestamps();
            $table->unsignedBigInteger('id_users');
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_distributor_products');
    }
};
