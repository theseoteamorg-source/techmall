<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $sales = Order::where('created_at', ' >', Carbon::now()->subDays(30))->sum('total');
        $new_customers = User::where('created_at', ' >', Carbon::now()->subDays(30))->count();
        $latest_orders = Order::latest()->take(5)->get();

        $sales_by_day = Order::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('SUM(total) as total_sales')
        )
        ->where('created_at', '>', Carbon::now()->subDays(30))
        ->groupBy('date')
        ->orderBy('date', 'asc')
        ->get();

        $sales_labels = $sales_by_day->pluck('date')->map(function ($date) {
            return Carbon::parse($date)->format('d M');
        });
        $sales_data = $sales_by_day->pluck('total_sales');

        return view('admin.dashboard', compact('sales', 'new_customers', 'latest_orders', 'sales_labels', 'sales_data'));
    }
}
