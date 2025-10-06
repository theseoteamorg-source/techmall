<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Currency::create([
            'country' => 'USA',
            'currency_code' => 'USD',
            'currency_name' => 'United States Dollar',
            'exchange_rate' => 1.00
        ]);

        Currency::create([
            'country' => 'Europe',
            'currency_code' => 'EUR',
            'currency_name' => 'Euro',
            'exchange_rate' => 0.92
        ]);

        Currency::create([
            'country' => 'United Kingdom',
            'currency_code' => 'GBP',
            'currency_name' => 'British Pound',
            'exchange_rate' => 0.80
        ]);

        Currency::create([
            'country' => 'Pakistan',
            'currency_code' => 'PKR',
            'currency_name' => 'Pakistani Rupee',
            'exchange_rate' => 278.00
        ]);
    }
}
