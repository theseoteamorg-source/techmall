@extends('layouts.admin')

@section('title', 'Order Details')
@section('content-header', 'Order Details')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.orders.index') }}">Orders</a></li>
    <li class="breadcrumb-item active">Details</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Order #{{ $order->id }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <p><strong>Customer:</strong> {{ $order->user->name }}</p>
                    <p><strong>Email:</strong> {{ $order->user->email }}</p>
                    <p><strong>Total:</strong> {{ $order->total }}</p>
                    <p><strong>Status:</strong> {{ $order->status }}</p>
                    <p><strong>Date:</strong> {{ $order->created_at->format('d-m-Y') }}</p>
                    <hr>
                    <h4>Products</h4>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->pivot->quantity }}</td>
                                <td>{{ $product->pivot->price }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
