<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = Tag::factory()->count(20)->create();

        $categoryIds = Category::pluck('id')->toArray();

        foreach ($tags as $tag) {
            $tag->categories()->attach(
                collect($categoryIds)->random(rand(2, 8))->unique()
            );
        }
    }
}
