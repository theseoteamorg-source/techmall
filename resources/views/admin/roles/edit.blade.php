@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Role</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.roles.update', $role) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $role->name }}">
                            </div>
                            <div class="form-group">
                                <label for="permissions">Permissions</label>
                                <select name="permissions[]" id="permissions" class="form-control" multiple>
                                    @foreach ($permissions as $permission)
                                        <option value="{{ $permission->name }}" {{ $role->hasPermissionTo($permission->name) ? 'selected' : '' }}>{{ $permission->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
