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
        Schema::create('students', function (Blueprint $table) {
            // Student ID (USN, or LRN)
            $table->string('student_id')->primary();

            // Personal Info
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->date('date_of_birth')->nullable();

            // Academic Info
            $table->string('course');
            $table->enum('year_level', ['Grade 11', 'Grade 12', '1st Year', '2nd Year', '3rd Year', '4th Year']);
            $table->string('section');

            // Contact Info
            $table->string('address')->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('email')->unique()->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
