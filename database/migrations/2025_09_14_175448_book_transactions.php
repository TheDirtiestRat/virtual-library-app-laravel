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
        Schema::create('book_transactions', function (Blueprint $table) {
            $table->id('transaction_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('book_id');
            $table->date('borrowed_at');
            $table->date('due_date');
            $table->date('returned_at')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('book_transactions');
    }
};
