<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->enum('payment_method', ['cash on delivery', 'credit card', 'bank transfer', 'paypal', 'stripe'])->default('cash on delivery');
            $table->enum('payment_status', ['pending', 'paid', 'failed'])->default('pending');
            $table->enum('status', ['new', 'processing', 'shipped', 'delivered', 'cancelled'])->default('new');
            $table->enum('currency', ['php', 'usd', 'eur', 'cad'])->default('php');
            $table->integer('shipping_amount')->default(0);
            $table->enum('shipping_method', ['standard', 'express', 'pick-up', 'none'])->default('none');
            $table->unsignedInteger('grand_total');
            $table->string('notes')->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->timestamps();
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
