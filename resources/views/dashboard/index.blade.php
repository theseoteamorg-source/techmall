@extends('layouts.shop')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <a href="{{ route('dashboard.index') }}" class="list-group-item list-group-item-action active">Dashboard</a>
                    <a href="{{ route('dashboard.orders') }}" class="list-group-item list-group-item-action">Orders</a>
                    <a href="{{ route('dashboard.profile') }}" class="list-group-item list-group-item-action">Profile</a>
                    <a href="{{ route('logout') }}" class="list-group-item list-group-item-action" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Dashboard</h3>
                        <p>Welcome to your dashboard, {{ Auth::user()->name }}!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
