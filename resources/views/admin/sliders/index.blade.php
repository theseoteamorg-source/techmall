@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Sliders</div>

                    <div class="card-body">
                        <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary mb-3">Create Slider</a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Heading</th>
                                    <th>Sub-heading</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $slider)
                                    <tr>
                                        <td>{{ $slider->id }}</td>
                                        <td><img src="{{ $slider->image_path }}" alt="" width="100"></td>
                                        <td>{{ $slider->heading }}</td>
                                        <td>{{ $slider->sub_heading }}</td>
                                        <td>{{ $slider->is_active ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            <a href="{{ route('admin.sliders.edit', $slider->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form action="{{ route('admin.sliders.destroy', $slider->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this slider?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
