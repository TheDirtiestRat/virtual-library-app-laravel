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
        //
        Schema::create('books', function (Blueprint $table) {
            $table->id('id');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('authors');
            $table->string('publisher')->nullable();
            $table->string('publishedDate')->nullable();
            $table->text('description')->nullable();
            $table->string('pageCount')->nullable();
            $table->string('categories')->nullable();
            $table->string('thumbnail')->nullable();

            $table->string('industryIdentifiers')->nullable();

            $table->string('previewLink')->nullable();
            $table->string('infoLink')->nullable();
            $table->integer('available_copies')->default(1);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('books');
    }
};
