<?php

if (!function_exists('format_price')) {
    function format_price($price)
    {
        $currency = \App\Models\Setting::first()->currency ?? 'USD';
        return $currency . ' ' . number_format($price, 2);
    }
}
