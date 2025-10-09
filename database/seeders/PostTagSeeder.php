<?php

namespace Database\Seeders;

use App\Models\PostTag;
use Illuminate\Database\Seeder;
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
            PostTag::firstOrCreate(
                ['slug' => Str::slug($tag)],
                ['name' => $tag]
            );
        }
    }
}
