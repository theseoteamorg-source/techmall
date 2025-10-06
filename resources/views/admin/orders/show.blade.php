@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Order #{{ $order->id }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Billing Details</h4>
                                <p><strong>Name:</strong> {{ $order->name }}</p>
                                <p><strong>Email:</strong> {{ $order->email }}</p>
                                <p><strong>Address:</strong> {{ $order->address }}</p>
                                <p><strong>City:</strong> {{ $order->city }}</p>
                                <p><strong>Postal Code:</strong> {{ $order->postal_code }}</p>
                            </div>
                            <div class="col-md-6">
                                <h4>Order Details</h4>
                                <p><strong>Total:</strong> {{ $order->total }}</p>
                                <p><strong>Status:</strong> {{ $order->status }}</p>
                                <form action="{{ route('admin.orders.update', $order) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="status">Update Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Processing</option>
                                            <option value="shipped" {{ $order->status === 'shipped' ? 'selected' : '' }}>Shipped</option>
                                            <option value="delivered" {{ $order->status === 'delivered' ? 'selected' : '' }}>Delivered</option>
                                            <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <h4>Order Items</h4>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->items as $item)
                                <tr>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->price }}</td>
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
