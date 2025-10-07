@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Permission</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.permissions.update', $permission->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $permission->name }}">
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Update Permission</button>
                </form>
            </div>
        </div>
    </div>
@endsection
