<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $sales = Order::where('created_at', ' >', Carbon::now()->subDays(30))->sum('total');
        $new_customers = User::where('created_at', ' >', Carbon::now()->subDays(30))->count();
        $latest_orders = Order::latest()->take(5)->get();

        return view('admin.dashboard', compact('sales', 'new_customers', 'latest_orders'));
    }
}
