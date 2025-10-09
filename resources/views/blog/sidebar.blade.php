<div class="card mb-3">
    <div class="card-header">Categories</div>
    <div class="card-body">
        <ul class="list-group list-group-flush">
            @foreach ($categories as $category)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="#">{{ $category->name }}</a>
                    <span class="badge bg-primary rounded-pill">{{ $category->posts_count }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>

<div class="card mb-3">
    <div class="card-header">Tags</div>
    <div class="card-body">
        @foreach ($tags as $tag)
            <a href="#" class="btn btn-sm btn-outline-primary me-1 mb-1">{{ $tag->name }}</a>
        @endforeach
    </div>
</div>

<div class="card mb-3">
    <div class="card-header">Recent Posts</div>
    <div class="card-body">
        <ul class="list-group list-group-flush">
            @foreach ($recent_posts as $recent_post)
                <li class="list-group-item"><a href="{{ route('blog.show', $recent_post->slug) }}">{{ $recent_post->title }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
