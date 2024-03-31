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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->foreignId('cashier_id')->constrained('users')->onDelete('cascade');
            $table->integer('total');
            $table->integer('pay')->nullable();
            $table->integer('return')->nullable();
            $table->enum('status', ['Completed', 'Cancelled', 'Waiting', 'Cart'])->default('Cart');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
