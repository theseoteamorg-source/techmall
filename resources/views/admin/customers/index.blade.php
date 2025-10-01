@extends('layouts.admin')

@section('title', 'Customer List')
@section('content-header', 'Customer List')
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Customer List</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Customers</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.customers.create') }}" class="btn btn-primary">Add Customer</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Avatar</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($customers as $customer)
                                <tr>
                                    <td>{{ $customer->id }}</td>
                                    <td>
                                        <img src="{{ $customer->avatar }}" alt="" class="img-fluid" width="50">
                                    </td>
                                    <td>{{ $customer->first_name }}</td>
                                    <td>{{ $customer->last_name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->phone }}</td>
                                    <td>{{ $customer->address }}</td>
                                    <td>{{ $customer->created_at->format('d-m-Y') }}</td>
                                    <td>
                                        <a href="{{ route('admin.customers.edit', $customer) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        <a href="{{ route('admin.customers.destroy', $customer) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">No customers found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    {{ $customers->links() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
