@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Post Tags</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.post-tags.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Add New
                            </a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <table id="post-tags-table" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($postTags as $postTag)
                                    <tr>
                                        <td>{{ $postTag->id }}</td>
                                        <td>{{ $postTag->name }}</td>
                                        <td>{{ $postTag->slug }}</td>
                                        <td>
                                            <a href="{{ route('admin.post-tags.show', $postTag->id) }}" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('admin.post-tags.edit', $postTag->id) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                            <form action="{{ route('admin.post-tags.destroy', $postTag->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this item?')"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3">
                            {{ $postTags->links() }}
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
