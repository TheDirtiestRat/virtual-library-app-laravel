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
        Schema::create('students', function (Blueprint $table) {
            $table->id('student_id');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('course')->nullable();
            $table->enum('year_level', ['1st Year', '2nd Year', '3rd Year', '4th Year']);
            $table->enum('section', ['A', 'B', 'C', 'D', 'E'])->nullable();

            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('date_of_birth')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('students');
    }
};
