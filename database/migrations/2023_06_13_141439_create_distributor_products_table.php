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
            $table->id();
            $table->string('distributor_product_name', 255);
            $table->integer('distributor_product_quantity');
            $table->integer('distributor_product_price');
            $table->text('distributor_product_image')->nullable();
            $table->text('distributor_product_description');
            $table->unsignedBigInteger('id_distributor');
            $table->foreign('id_distributor')->references('id')->on('distributor')->onDelete('cascade');
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
