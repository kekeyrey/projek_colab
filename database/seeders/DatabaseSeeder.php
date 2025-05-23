<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Article;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create Admin User
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create Regular User
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        // Create Sample Articles
        Article::create([
            'title' => 'Getting Started with Laravel',
            'excerpt' => 'Learn how to build amazing web applications with Laravel framework.',
            'content' => 'Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects.',
            'status' => 'published',
            'user_id' => $user->id,
        ]);

        Article::create([
            'title' => 'Building Modern Web Applications',
            'excerpt' => 'Discover best practices for modern web development.',
            'content' => 'Modern web development has evolved significantly over the years. Today, we have access to powerful frameworks, tools, and methodologies that make building web applications faster and more efficient than ever before.',
            'status' => 'published',
            'user_id' => $user->id,
        ]);
    }
}