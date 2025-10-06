@extends('layouts.dashboard')

@section('title', 'My Orders')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">My Orders</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                            <tr>
                                <td>#{{ $order->id }}</td>
                                <td>{{ $order->created_at->format('d M Y') }}</td>
                                <td>${{ number_format($order->total, 2) }}</td>
                                <td><span class="badge bg-primary">{{ $order->status }}</span></td>
                                <td>
                                    <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-info">View</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">You have no orders yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
@endsection
