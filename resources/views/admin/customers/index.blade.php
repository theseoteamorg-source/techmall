@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Customers</h4>
                        <a href="{{ route('admin.customers.create') }}" class="btn btn-primary float-right">Add Customer</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Avatar</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td>{{ $customer->id }}</td>
                                        <td>
                                            @if ($customer->avatar)
                                                <img src="{{ asset($customer->avatar) }}" alt="{{ $customer->first_name }}" width="50">
                                            @endif
                                        </td>
                                        <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->phone }}</td>
                                        <td>
                                            <a href="{{ route('admin.customers.edit', $customer->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $customers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
