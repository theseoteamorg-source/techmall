<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function sales(Request $request)
    {
        $orders = Order::query()
            ->when($request->filled('from'), fn ($q) => $q->whereDate('created_at', '>=', $request->from))
            ->when($request->filled('to'), fn ($q) => $q->whereDate('created_at', '<=', $request->to))
            ->paginate(10);

        return view('admin.reports.sales', compact('orders'));
    }

    public function customers(Request $request)
    {
        $customers = User::query()
            ->when($request->filled('from'), fn ($q) => $q->whereDate('created_at', '>=', $request->from))
            ->when($request->filled('to'), fn ($q) => $q->whereDate('created_at', '<=', $request->to))
            ->paginate(10);

        return view('admin.reports.customers', compact('customers'));
    }

    public function lowStock()
    {
        $products = Product::where('quantity', '<', 10)->paginate(10);

        return view('admin.reports.low-stock', compact('products'));
    }
}
