@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Payment Methods</h3>
                    <a href="{{ route('admin.payment-methods.create') }}" class="btn btn-primary btn-sm float-right">Add New</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($paymentMethods as $paymentMethod)
                            <tr>
                                <td>{{ $paymentMethod->id }}</td>
                                <td>{{ $paymentMethod->name }}</td>
                                <td>{{ $paymentMethod->code }}</td>
                                <td>{{ $paymentMethod->status ? 'Enabled' : 'Disabled' }}</td>
                                <td>
                                    <a href="{{ route('admin.payment-methods.edit', $paymentMethod->id) }}" class="btn btn-info btn-sm">Edit</a>
                                    <form action="{{ route('admin.payment-methods.destroy', $paymentMethod->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this payment method?')">Delete</button>
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
