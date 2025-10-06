<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\PostCategory;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();
        $category = PostCategory::first();

        for ($i = 0; $i < 10; $i++) {
            $title = 'This is a dummy post ' . ($i + 1);
            DB::table('posts')->insert([
                'user_id' => $user->id,
                'post_category_id' => $category->id,
                'title' => $title,
                'slug' => Str::slug($title),
                'content' => '<p>This is some dummy content for post ' . ($i + 1) . '.</p>',
                'is_published' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
