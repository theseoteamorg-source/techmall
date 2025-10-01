<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            [
                'key' => 'address',
                'value' => '123 Main Street, Anytown, USA 12345'
            ],
            [
                'key' => 'phone',
                'value' => '+1 (555) 123-4567'
            ],
            [
                'key' => 'email',
                'value' => 'support@techmall.pk'
            ]
        ]);
    }
}
