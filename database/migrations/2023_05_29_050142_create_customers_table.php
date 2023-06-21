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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name', 255);
            $table->enum('customer_gender', ['Laki-Laki', 'Perempuan']);
            $table->string('customer_email', 255);
            $table->text('customer_image')->nullable();
            $table->string('customer_phone', 15);
            $table->text('customer_address');
            $table->unsignedBigInteger('id_users');
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
