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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title');
            $table->foreignId('author_id')->constrained(
                table: 'users', 
                indexName: 'posts_author_id'
            );
            $table->text('body');
            $table->foreignId('category_id')->constrained(
                table: 'categories', 
                indexName: 'posts_category_id'
            );
            $table->string('image')->nullable(); // FEATURED IMAGE
            $table->string('keywords')->nullable(); // KEYWORDS
            $table->string('metadesc')->nullable(); // META DESCRIPTION
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
