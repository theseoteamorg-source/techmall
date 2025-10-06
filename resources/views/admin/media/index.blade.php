@extends('layouts.admin')

@section('title', 'Media Library')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Media Library</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.media.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Add New
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($media as $file)
                                <div class="col-md-2">
                                    <div class="card">
                                        <div class="card-body">
                                            <img src="{{ asset('storage/' . $file->path) }}" class="img-fluid">
                                        </div>
                                        <div class="card-footer">
                                            <form action="{{ route('admin.media.destroy', $file->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
