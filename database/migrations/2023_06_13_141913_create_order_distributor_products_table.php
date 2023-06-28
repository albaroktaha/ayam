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
            $table->string('order_distributor_product_name_product', 255);
            $table->string('order_distributor_product_distributor', 255);
            $table->integer('order_distributor_product_quantity');
            $table->integer('order_distributor_product_price');
            $table->integer('order_distributor_product_total');
            $table->enum('order_distributor_product_status', ['Completed', 'Pending', 'Canceled']);
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
