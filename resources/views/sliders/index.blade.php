@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Manage Sliders</h1>

        <a href="{{ route('sliders.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add New Slider</a>

        <div class="mt-8">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2">Heading</th>
                        <th class="py-2">Sub Heading</th>
                        <th class="py-2">Image</th>
                        <th class="py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sliders as $slider)
                        <tr>
                            <td class="border px-4 py-2">{{ $slider->heading }}</td>
                            <td class="border px-4 py-2">{{ $slider->sub_heading }}</td>
                            <td class="border px-4 py-2"><img src="{{ Storage::url($slider->image_path) }}" alt="" width="100"></td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('sliders.edit', $slider->id) }}" class="text-blue-600">Edit</a>
                                <form action="{{ route('sliders.destroy', $slider->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
