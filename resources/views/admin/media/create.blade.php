@extends('layouts.admin')

@section('title', 'Upload Media')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Upload Media</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.media.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="file">File</label>
                                <input type="file" name="file" id="file" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
