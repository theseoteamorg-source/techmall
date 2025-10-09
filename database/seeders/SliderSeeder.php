<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Slider;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::create([
            'image_path' => 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80',
            'heading' => 'Welcome to our E-commerce Store',
            'sub_heading' => 'Discover a wide range of products at amazing prices.',
        ]);

        Slider::create([
            'image_path' => 'https://images.unsplash.com/photo-1526738549149-8e072d544146?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80',
            'heading' => 'Latest Tech Gadgets',
            'sub_heading' => 'Explore the newest and most innovative tech products.',
        ]);

        Slider::create([
            'image_path' => 'https://images.unsplash.com/photo-1556740738-b6a63e27c4df?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80',
            'heading' => 'Shop with Confidence',
            'sub_heading' => 'Enjoy our 7-day exchange policy and fast delivery.',
        ]);
    }
}
