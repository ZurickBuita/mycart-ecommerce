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
            $table->string('slug');
            $table->string('summary');
            $table->string('description');
            $table->boolean('visibility')->default(true);
            $table->string('image');
            $table->double('price');
            $table->integer('quantity');
            $table->string('sku');
            $table->integer('discount');
            $table->enum('size', ['S', 'M', 'L', 'XL', '2XL'])->default('S');
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
