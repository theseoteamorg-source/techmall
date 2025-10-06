@extends('layouts.shop')

@section('content')
    <div class="container my-5">
        <h1 class="mb-4">Our Blog</h1>
        <div class="row">
            @forelse($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="{{ route('blog.show', $post) }}">
                            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a></h5>
                            <p class="card-text">{{ Str::limit($post->excerpt, 100) }}</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Posted on {{ $post->created_at->format('M d, Y') }}</small>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col">
                    <p>No posts to display.</p>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
