<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Category::create([
            'name' => 'Tutorial',
            'slug'=>'tutorial'
        ]);
        Category::create([
            'name' => 'Berita',
            'slug'=>'berita'
        ]);

        Post::factory(20)->create();

        $this -> call(AdminSeeder::class);
    }
}
