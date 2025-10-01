<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Redirect;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function index()
    {
        $redirects = Redirect::latest()->paginate(10);
        return view('admin.redirects.index', compact('redirects'));
    }

    public function create()
    {
        return view('admin.redirects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'source' => 'required|string|max:255|unique:redirects',
            'destination' => 'required|string|max:255',
        ]);

        Redirect::create($request->all());

        return redirect()->route('admin.redirects.index')
            ->with('success', 'Redirect created successfully.');
    }

    public function edit(Redirect $redirect)
    {
        return view('admin.redirects.edit', compact('redirect'));
    }

    public function update(Request $request, Redirect $redirect)
    {
        $request->validate([
            'source' => 'required|string|max:255|unique:redirects,source,' . $redirect->id,
            'destination' => 'required|string|max:255',
        ]);

        $redirect->update($request->all());

        return redirect()->route('admin.redirects.index')
            ->with('success', 'Redirect updated successfully');
    }

    public function destroy(Redirect $redirect)
    {
        $redirect->delete();

        return redirect()->route('admin.redirects.index')
            ->with('success', 'Redirect deleted successfully');
    }
}
