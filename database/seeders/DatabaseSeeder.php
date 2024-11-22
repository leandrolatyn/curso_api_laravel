<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Recipe;
use App\Models\Tag;
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
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::factory(29)->create();
        Category::factory(12)->create();
        Recipe::factory(100)->create();
        Tag::factory(40)->create();

        $recipes = Recipe::all();
        $tags = Tag::all();

        $tagsToAttach = $tags->random(rand(2, 4))->pluck('id')->toArray();
        $timestamps = ['created_at' => now(), 'updated_at' => now()];

        foreach ($recipes as $recipe) {
            $tagsToAttach = $tags->random(rand(2, 4))->pluck('id')->toArray();
            $timestamps = ['created_at' => now(), 'updated_at' => now()];

            foreach ($tagsToAttach as $tagId) {
                $recipe->tags()->attach($tagId, $timestamps);
            }
        }
    }
}
