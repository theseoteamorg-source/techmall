@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Media Library</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('admin.media.create') }}" class="btn btn-sm btn-outline-secondary">
                    Add New
                </a>
            </div>
        </div>

        <div class="row">
            @foreach ($media as $medium)
                <div class="col-md-2 mb-3">
                    <div class="card">
                        <img src="{{ asset('storage/' . $medium->file_name) }}" class="card-img-top" alt="{{ $medium->name }}">
                        <div class="card-body">
                            <p class="card-text">{{ $medium->name }}</p>
                            <form action="{{ route('admin.media.destroy', $medium->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{ $media->links() }}
    </div>
@endsection
