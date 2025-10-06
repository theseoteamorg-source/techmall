<div class="container-fluid">
    <div class="row">
        @foreach ($media as $medium)
            <div class="col-md-2 mb-3">
                <div class="card media-item" data-id="{{ $medium->id }}" data-url="{{ asset('storage/' . $medium->file_name) }}">
                    <img src="{{ asset('storage/' . $medium->file_name) }}" class="card-img-top" alt="{{ $medium->name }}">
                </div>
            </div>
        @endforeach
    </div>

    {{ $media->links() }}
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.media-item').forEach(item => {
            item.addEventListener('click', event => {
                const id = item.getAttribute('data-id');
                const url = item.getAttribute('data-url');
                window.parent.postMessage({ id: id, url: url }, '*');
            });
        });
    });
</script>
