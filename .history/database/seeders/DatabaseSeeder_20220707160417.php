<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;

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
        User::create([
            'name'=>'admin',
            'username'=>'adminweb',
            'email'=>'adminweb@mail.com',
            'password'=>bcrypt('admin1234'),
            'role'=>'admin',
            'remember_token'=>Str::random(10),
        ],);
        User::factory(2)->create();
        Category::create([
            'name' => 'Tutorial',
            'slug'=>'tutorial'
        ]);
        Category::create([
            'name' => 'Berita',
            'slug'=>'berita'
        ]);

        Post::factory(20)->create();
    }
}
