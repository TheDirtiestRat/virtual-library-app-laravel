<?php

namespace Database\Seeders;

use App\Models\User;
use \App\Models\Book;
use \App\Models\Student;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'testUser',
            'email' => 'test@example.com',
            'email_verified_at' => now(),
            'password' => 'user',
        ]);
        User::factory()->create([
            'name' => 'LibrarianStaff',
            'email' => 'librarian@example.com',
            'email_verified_at' => now(),
            'password' => 'librarian',
        ]);

        // create random books
        Book::factory(250)->create();

        // create random students
        Student::factory(550)->create();
    }
}
