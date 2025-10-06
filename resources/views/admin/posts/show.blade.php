@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $post->title }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if ($post->image)
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid">
                            </div>
                        @endif
                        <div>
                            {!! $post->content !!}
                        </div>
                        <hr>
                        <p><strong>Category:</strong> {{ $post->category->name }}</p>
                        <p><strong>Tags:</strong>
                            @foreach ($post->tags as $tag)
                                <span class="badge badge-primary">{{ $tag->name }}</span>
                            @endforeach
                        </p>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Back to List</a>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
@endsection
