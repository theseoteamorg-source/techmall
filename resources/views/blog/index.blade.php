@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Blog</h1>
                @foreach ($posts as $post)
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid rounded-start" alt="{{ $post->title }}">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><a href="{{ route('blog.show', $post->slug) }}">{{ $post->title }}</a></h5>
                                    <p class="card-text">{{ Str::limit(strip_tags($post->content), 150) }}</p>
                                    <p class="card-text"><small class="text-muted">Posted on {{ $post->created_at->format('M d, Y') }} in <a href="#">{{ $post->postCategory->name }}</a></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{ $posts->links() }}
            </div>
            <div class="col-md-4">
                @include('blog.sidebar')
            </div>
        </div>
    </div>
@endsection
