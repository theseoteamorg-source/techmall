@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Post Tag Details</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $postTag->id }}</td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $postTag->name }}</td>
                                </tr>
                                <tr>
                                    <th>Slug</th>
                                    <td>{{ $postTag->slug }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="{{ route('admin.post-tags.edit', $postTag->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('admin.post-tags.index') }}" class="btn btn-secondary">Back to List</a>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
