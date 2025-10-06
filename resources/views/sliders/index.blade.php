@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="mb-4">Manage Sliders</h1>

        <a href="{{ route('sliders.create') }}" class="btn btn-primary mb-4">Add New Slider</a>

        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Heading</th>
                            <th>Sub Heading</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $slider)
                            <tr>
                                <td>{{ $slider->heading }}</td>
                                <td>{{ $slider->sub_heading }}</td>
                                <td><img src="{{ Storage::url($slider->image_path) }}" alt="" width="100"></td>
                                <td>
                                    <a href="{{ route('sliders.edit', $slider->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('sliders.destroy', $slider->id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
