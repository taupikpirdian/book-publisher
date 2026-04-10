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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->foreignId('author_id')->constrained('authors')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories')->onDelete('restrict');
            $table->decimal('price', 10, 2);
            $table->string('cover_image')->nullable();
            $table->text('synopsis')->nullable();
            $table->string('isbn')->nullable()->unique();
            $table->string('publisher')->nullable();
            $table->date('published_at')->nullable();
            $table->integer('pages')->nullable();
            $table->string('language')->default('Indonesia');
            $table->string('dimensions')->nullable();
            $table->string('weight')->nullable();
            $table->string('cover_type')->default('Soft Cover');
            $table->boolean('is_bestseller')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
