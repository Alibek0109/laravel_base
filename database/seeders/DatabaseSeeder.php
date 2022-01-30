<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $category = Category::factory(10)->create();
        $tags = Tag::factory(50)->create();
        $posts = Post::factory(200)->create();

        foreach($posts as $post) {
            $tagsId = $tags->random(5)->pluck('id');
            $post->tags()->attach($tagsId);
        }

        // \App\Models\User::factory(10)->create();
    }
}
