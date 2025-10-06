@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Post Category Details</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $postCategory->id }}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $postCategory->name }}</td>
                                </tr>
                                <tr>
                                    <th>Slug</th>
                                    <td>{{ $postCategory->slug }}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ $postCategory->description }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="{{ route('admin.post-categories.edit', $postCategory->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('admin.post-categories.index') }}" class="btn btn-secondary">Back to List</a>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
