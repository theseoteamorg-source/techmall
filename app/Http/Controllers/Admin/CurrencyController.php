<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index()
    {
        $currencies = Currency::all();
        return view('admin.currencies.index', compact('currencies'));
    }

    public function create()
    {
        return view('admin.currencies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'country' => 'required',
            'currency_code' => 'required',
            'currency_name' => 'required',
            'exchange_rate' => 'required|numeric',
        ]);

        Currency::create($request->all());

        return redirect()->route('admin.currencies.index')
            ->with('success', 'Currency created successfully.');
    }

    public function edit(Currency $currency)
    {
        return view('admin.currencies.edit', compact('currency'));
    }

    public function update(Request $request, Currency $currency)
    {
        $request->validate([
            'country' => 'required',
            'currency_code' => 'required',
            'currency_name' => 'required',
            'exchange_rate' => 'required|numeric',
        ]);

        $currency->update($request->all());

        return redirect()->route('admin.currencies.index')
            ->with('success', 'Currency updated successfully');
    }

    public function destroy(Currency $currency)
    {
        $currency->delete();

        return redirect()->route('admin.currencies.index')
            ->with('success', 'Currency deleted successfully');
    }
}
