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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('description')->nullable();
            $table->string('images');
            $table->decimal('price', 10, 2)->default(0);
            $table->boolean('in_stock')->default(0);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_feature')->default(true);
            $table->boolean('on_sale')->default(false);
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
           
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
