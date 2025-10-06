@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $page->title }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div>
                            {!! $page->content !!}
                        </div>
                        <hr>
                        <p><strong>Published:</strong> {{ $page->is_published ? 'Yes' : 'No' }}</p>
                        <p><strong>Author:</strong> {{ $page->user->name }}</p>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="{{ route('admin.pages.edit', $page->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary">Back to List</a>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
