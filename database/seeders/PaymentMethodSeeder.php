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
        PaymentMethod::create([
            'name' => 'Cash on Delivery',
            'code' => 'cod',
            'description' => 'Pay with cash upon delivery.',
            'status' => 1,
        ]);

        PaymentMethod::create([
            'name' => 'Bank Transfer',
            'code' => 'bank_transfer',
            'description' => 'Pay via bank transfer.',
            'status' => 1,
        ]);
    }
}
