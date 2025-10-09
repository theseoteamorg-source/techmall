<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

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

        $setting->update($request->all());

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logos', 'public');
            $setting->logo = $path;
        }

        $setting->save();

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }

    public function clearCache()
    {
        Artisan::call('cache:clear');
        return redirect()->back()->with('success', 'Cache cleared successfully.');
    }
}
