<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'PHP',
            'Laravel',
            'JavaScript',
            'Vue.js',
            'MySQL',
            'Livewire',
        ];

        foreach ($tags as $tag) {
            DB::table('post_tags')->insert([
                'name' => $tag,
                'slug' => Str::slug($tag),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
