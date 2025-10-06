@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit User</h1>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit User</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
                </div>
                <div class="form-group mb-3">
                    <label for="is_admin">Role</label>
                    <select name="is_admin" id="is_admin" class="form-control">
                        <option value="0" {{ !$user->is_admin ? 'selected' : '' }}>User</option>
                        <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update User</button>
            </form>
        </div>
    </div>
</div>
@endsection
