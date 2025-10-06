@extends('layouts.admin')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Edit Slider</h1>

        <form action="{{ route('sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="heading" class="block text-gray-700">Heading</label>
                <input type="text" name="heading" id="heading" value="{{ $slider->heading }}" class="w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <div class="mb-4">
                <label for="sub_heading" class="block text-gray-700">Sub Heading</label>
                <input type="text" name="sub_heading" id="sub_heading" value="{{ $slider->sub_heading }}" class="w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-700">Image</label>
                <input type="file" name="image" id="image" class="w-full">
                @if ($slider->image_path)
                    <img src="{{ Storage::url($slider->image_path) }}" alt="" width="200" class="mt-4">
                @endif
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Slider</button>
        </form>
    </div>
@endsection
