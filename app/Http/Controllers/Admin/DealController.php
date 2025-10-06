<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deal;
use App\Models\Product;
use Illuminate\Http\Request;

class DealController extends Controller
{
    public function index()
    {
        $deals = Deal::with('products')->get();
        return view('admin.deals.index', compact('deals'));
    }

    public function create()
    {
        $products = Product::all();
        return view('admin.deals.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required|in:discount,combo',
            'discount' => 'required|numeric|min:0',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'products' => 'required|array|min:1',
        ]);

        $deal = Deal::create($request->only('name', 'type', 'discount', 'start_date', 'end_date'));

        $deal->products()->attach($request->products);

        return redirect()->route('admin.deals.index')
            ->with('success', 'Deal created successfully.');
    }

    public function show(Deal $deal)
    {
        return view('admin.deals.show', compact('deal'));
    }

    public function edit(Deal $deal)
    {
        $products = Product::all();
        return view('admin.deals.edit', compact('deal', 'products'));
    }

    public function update(Request $request, Deal $deal)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required|in:discount,combo',
            'discount' => 'required|numeric|min:0',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'products' => 'required|array|min:1',
        ]);

        $deal->update($request->only('name', 'type', 'discount', 'start_date', 'end_date'));

        $deal->products()->sync($request->products);

        return redirect()->route('admin.deals.index')
            ->with('success', 'Deal updated successfully.');
    }

    public function destroy(Deal $deal)
    {
        $deal->delete();

        return redirect()->route('admin.deals.index')
            ->with('success', 'Deal deleted successfully.');
    }
}
