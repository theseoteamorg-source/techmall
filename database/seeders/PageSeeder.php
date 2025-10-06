<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();

        $pages = [
            [
                'title' => 'About Us',
                'slug' => 'about-us',
                'content' => '<p>This is the About Us page.</p>',
            ],
            [
                'title' => 'Contact Us',
                'slug' => 'contact-us',
                'content' => '<p>This is the Contact Us page.</p>',
            ],
            [
                'title' => 'Terms & Conditions',
                'slug' => 'terms-conditions',
                'content' => '<p>These are the terms and conditions.</p>',
            ],
            [
                'title' => 'Privacy Policy',
                'slug' => 'privacy-policy',
                'content' => '<p>This is the privacy policy.</p>',
            ],
        ];

        foreach ($pages as $page) {
            DB::table('pages')->insert([
                'user_id' => $user->id,
                'title' => $page['title'],
                'slug' => $page['slug'],
                'content' => $page['content'],
                'is_published' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
