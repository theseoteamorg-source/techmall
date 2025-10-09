<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Shipment;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
    public function store(Request $request, Order $order)
    {
        $request->validate([
            'carrier' => 'required|string|max:255',
            'tracking_number' => 'required|string|max:255',
        ]);

        $order->shipments()->create($request->all());

        $order->update(['status' => 'shipped']);

        return redirect()->route('admin.orders.show', $order)->with('success', 'Shipment added successfully.');
    }

    public function destroy(Order $order, Shipment $shipment)
    {
        $shipment->delete();

        if ($order->shipments()->count() === 0) {
            $order->update(['status' => 'processing']);
        }

        return redirect()->route('admin.orders.show', $order)->with('success', 'Shipment deleted successfully.');
    }
}
