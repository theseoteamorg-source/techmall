<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index()
    {
        $settings = config('settings');
        return view('admin.settings.index', compact('settings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'store_name' => 'required|string|max:255',
            'sitemap' => 'required|string|max:255',
            'robots' => 'required|string',
        ]);

        $settings = [
            'store_name' => $request->store_name,
            'sitemap' => $request->sitemap,
            'robots' => $request->robots,
        ];

        config(['settings' => $settings]);

        $file = '<?php return ' . var_export($settings, true) . ';';
        file_put_contents(config_path('settings.php'), $file);

        Storage::disk('public')->put('robots.txt', $request->robots);

        Artisan::call('sitemap:generate');

        return redirect()->route('admin.settings.index')
            ->with('success', 'Settings updated successfully.');
    }
}
