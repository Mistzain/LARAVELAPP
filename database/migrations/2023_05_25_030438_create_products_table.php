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
            $table->mediumText('description');
            $table->text('category');
            $table->text('branch')->default('Main');
            $table->decimal('price', 8, 2)->default(49.99);
            ;
            $table->string('unit')->default('Unit');
            $table->decimal('in_stock', 8, 2)->default(1);
            $table->decimal('on_order', 8, 2)->default(0);
            $table->boolean('is_visible')->default(0);
            $table->string('image')->default('default.jpg');
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