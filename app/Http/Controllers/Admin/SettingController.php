<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $currencies = Currency::all();
        $setting = Setting::first();
        return view('admin.settings', compact('currencies', 'setting'));
    }

    public function store(Request $request)
    {
        $setting = Setting::firstOrCreate([]);
        $setting->currency = $request->currency;
        $setting->save();

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}
