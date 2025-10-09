<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use Illuminate\Http\Request;

class DealController extends Controller
{
    public function index()
    {
        $deals = Deal::with('products')->where('start_date', '<', now())->where('end_date', '>', now())->get();
        return view('deals.index', compact('deals'));
    }
}
