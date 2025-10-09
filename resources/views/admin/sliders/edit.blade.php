@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Slider</div>

                    <div class="card-body">
                        <form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="image_path">Image</label>
                                <input type="file" name="image_path" id="image_path" class="form-control @error('image_path') is-invalid @enderror">
                                @error('image_path')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <img src="{{ $slider->image_path }}" alt="" width="100" class="mt-2">
                            </div>

                            <div class="form-group">
                                <label for="heading">Heading</label>
                                <input type="text" name="heading" id="heading" class="form-control @error('heading') is-invalid @enderror" value="{{ old('heading', $slider->heading) }}">
                                @error('heading')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="sub_heading">Sub-heading</label>
                                <input type="text" name="sub_heading" id="sub_heading" class="form-control @error('sub_heading') is-invalid @enderror" value="{{ old('sub_heading', $slider->sub_heading) }}">
                                @error('sub_heading')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="link">Link</label>
                                <input type="text" name="link" id="link" class="form-control @error('link') is-invalid @enderror" value="{{ old('link', $slider->link) }}">
                                @error('link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="button_text">Button Text</label>
                                <input type="text" name="button_text" id="button_text" class="form-control @error('button_text') is-invalid @enderror" value="{{ old('button_text', $slider->button_text) }}">
                                @error('button_text')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $slider->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">
                                        Active
                                    </label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
