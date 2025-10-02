@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Add New Slider</h1>

        <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="heading" class="block text-gray-700">Heading</label>
                <input type="text" name="heading" id="heading" class="w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <div class="mb-4">
                <label for="sub_heading" class="block text-gray-700">Sub Heading</label>
                <input type="text" name="sub_heading" id="sub_heading" class="w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <div class="mb-4">
                <label for="image" class="block text-gray-700">Image</label>
                <input type="file" name="image" id="image" class="w-full">
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Slider</button>
        </form>
    </div>
@endsection
