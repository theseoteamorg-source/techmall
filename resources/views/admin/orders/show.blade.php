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
                                <p><strong>Total:</strong> {{ $order->total }}</p>
                                <p><strong>Status:</strong> {{ $order->status }}</p>
                                <p><strong>Date:</strong> {{ $order->created_at->format('d-m-Y') }}</p>
                            </div>
                        </div>
                        <hr>
                        <h5>Order Items</h5>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->items as $item)
                                    <tr>
                                        <td>{{ $item->product->name }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->price }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        <h5>Update Order Status</h5>
                        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="processing" @if($order->status == 'processing') selected @endif>Processing</option>
                                    <option value="shipped" @if($order->status == 'shipped') selected @endif>Shipped</option>
                                    <option value="delivered" @if($order->status == 'delivered') selected @endif>Delivered</option>
                                    <option value="cancelled" @if($order->status == 'cancelled') selected @endif>Cancelled</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Status</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
