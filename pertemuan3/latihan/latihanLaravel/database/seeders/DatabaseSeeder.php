<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Tugas 1. Membuat 5 user secara manual dengan username user1-useer10
        for($i = 1; $i <= 5; $i++){
            User::factory()->create([
                'name' => 'User ' . $i,
                'username' => 'user' . $i,
                'email' => 'user' . $i . '@example.com',
                'password' => bcrypt('password'),
            ]);
        }

        //membuat 2 category secara otomatis
        Category::factory(2)->create();
        //membuat 10 post secara otomatis
        Post::factory(10)->recycle(User::all())->recycle(Category::all())->create();
    }
}
