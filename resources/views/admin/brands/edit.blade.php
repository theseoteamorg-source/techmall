@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Brand</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.brands.update', $brand->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ $brand->name }}">
                            </div>
                            <div class.form-group">
                                <label for="slug">Slug</label>
                                <input type="text" name="slug" class="form-control" id="slug" value="{{ $brand->slug }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
