@extends('layouts.shop')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="{{ route('dashboard.index') }}" class="list-group-item list-group-item-action">Dashboard</a>
                    <a href="{{ route('dashboard.orders') }}" class="list-group-item list-group-item-action active">Orders</a>
                    <a href="{{ route('dashboard.profile') }}" class="list-group-item list-group-item-action">Profile</a>
                    <a href="{{ route('logout') }}" class="list-group-item list-group-item-action" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">My Orders</h3>
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
                                @forelse($orders as $order)
                                    <tr>
                                        <td>#{{ $order->id }}</td>
                                        <td>{{ $order->created_at->format('d M Y') }}</td>
                                        <td>${{ number_format($order->total, 2) }}</td>
                                        <td><span class="badge bg-primary">{{ $order->status }}</span></td>
                                        <td><a href="{{ route('orders.show', $order) }}" class="btn btn-primary btn-sm">View</a></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">You have no orders.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
