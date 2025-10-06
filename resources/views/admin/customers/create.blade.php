@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Customer</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.customers.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="avatar">Avatar</label>
                                <input type="file" name="avatar" id="avatar" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Add Customer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
