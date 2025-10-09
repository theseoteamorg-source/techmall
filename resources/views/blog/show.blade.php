@extends('layouts.frontend')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-8">
                <article>
                    <header class="mb-4">
                        <h1 class="fw-bolder mb-1">{{ $post->title }}</h1>
                        <div class="text-muted fst-italic mb-2">Posted on {{ $post->created_at->format('M d, Y') }}</div>
                        <a class="badge bg-secondary text-decoration-none link-light" href="#!">{{ $post->category->name }}</a>
                    </header>
                    <figure class="mb-4">
                        <img class="img-fluid rounded" src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" />
                    </figure>
                    <section class="mb-5">
                        {!! $post->body !!}
                    </section>
                </article>
            </div>
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">Search</div>
                    <div class="card-body">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                            <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">Categories</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    @foreach($post_categories as $category)
                                        <li><a href="#!">{{ $category->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
