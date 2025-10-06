@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Customer</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $customer->first_name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $customer->last_name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ $customer->email }}" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control" value="{{ $customer->phone }}">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" class="form-control">{{ $customer->address }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="avatar">Avatar</label>
                                <input type="file" name="avatar" id="avatar" class="form-control">
                                @if ($customer->avatar)
                                    <img src="{{ asset($customer->avatar) }}" alt="{{ $customer->first_name }}" width="100">
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Update Customer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
