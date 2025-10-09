<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PaymentMethod;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PaymentMethod::firstOrCreate([
            'code' => 'cod',
        ], [
            'name' => 'Cash on Delivery',
            'description' => 'Pay with cash upon delivery.',
            'status' => 1,
        ]);

        PaymentMethod::firstOrCreate([
            'code' => 'bank_transfer',
        ], [
            'name' => 'Bank Transfer',
            'description' => 'Pay via bank transfer.',
            'status' => 1,
        ]);
    }
}
