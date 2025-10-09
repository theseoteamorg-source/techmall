@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Order Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Customer Details</h5>
                                <p><strong>Name:</strong> {{ $order->name }}</p>
                                <p><strong>Email:</strong> {{ $order->email }}</p>
                                <p><strong>Address:</strong> {{ $order->address }}</p>
                                <p><strong>City:</strong> {{ $order->city }}</p>
                                <p><strong>Postal Code:</strong> {{ $order->postal_code }}</p>
                            </div>
                            <div class="col-md-6">
                                <h5>Order Details</h5>
                                <p><strong>Order ID:</strong> {{ $order->id }}</p>
                                <p><strong>Total:</strong> ${{ number_format($order->total, 2) }}</p>
                                <p><strong>Discount:</strong> ${{ number_format($order->discount, 2) }}</p>
                                <p><strong>Coupon:</strong> {{ $order->coupon_code }}</p>
                                <p><strong>Payment Method:</strong> {{ $order->payment_method }}</p>
                                <p><strong>Date:</strong> {{ $order->created_at->format('d M Y') }}</p>
                            </div>
                        </div>
                        <hr>
                        <h5>Items</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->items as $item)
                                    <tr>
                                        <td>{{ $item->product->name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>${{ number_format($item->price, 2) }}</td>
                                        <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Shipments</h4>
                    </div>
                    <div class="card-body">
                        <h5>Add Shipment</h5>
                        <form action="{{ route('admin.orders.shipments.store', $order->id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-5">
                                    <input type="text" name="carrier" class="form-control" placeholder="Carrier" required>
                                </div>
                                <div class="col-md-5">
                                    <input type="text" name="tracking_number" class="form-control" placeholder="Tracking Number" required>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary">Add Shipment</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <h5>Existing Shipments</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Carrier</th>
                                    <th>Tracking Number</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->shipments as $shipment)
                                    <tr>
                                        <td>{{ $shipment->carrier }}</td>
                                        <td>{{ $shipment->tracking_number }}</td>
                                        <td>{{ $shipment->created_at->format('d M Y') }}</td>
                                        <td>
                                            <form action="{{ route('admin.orders.shipments.destroy', [$order->id, $shipment->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
