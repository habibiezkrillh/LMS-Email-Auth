<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('collections', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type'); // Book, Journal, Newspaper, CD, etc.
            $table->boolean('is_physical')->default(true);
            $table->unsignedBigInteger('librarian_id')->nullable();
            $table->foreign('librarian_id')->references('id')->on('librarians')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('collections');
    }
};
