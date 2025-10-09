@extends('layouts.frontend')

@section('title', $post->meta_title ?? $post->title)
@section('meta_description', $post->meta_description)
@section('meta_keywords', $post->meta_keywords)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>{{ $post->title }}</h1>
                <p class="text-muted">Posted on {{ $post->created_at->format('M d, Y') }} in <a href="#">{{ $post->postCategory->name }}</a></p>
                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid rounded mb-3" alt="{{ $post->title }}">
                <div>
                    {!! $post->content !!}
                </div>
                <hr>
                <div class="mt-3">
                    @foreach ($post->tags as $tag)
                        <a href="#" class="btn btn-sm btn-outline-primary me-1 mb-1">#{{ $tag->name }}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4">
                @include('blog.sidebar')
            </div>
        </div>
    </div>
@endsection
