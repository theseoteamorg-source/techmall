<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function orders()
    {
        $orders = Auth::user()->orders()->latest()->paginate(10);
        return view('dashboard.orders', compact('orders'));
    }

    public function profile()
    {
        return view('dashboard.profile');
    }
}
