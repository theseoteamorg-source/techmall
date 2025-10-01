@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Create Redirect</h1>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <form action="{{ route('admin.redirects.store') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="source" class="block text-gray-700 font-bold mb-2">Source URL</label>
                    <input type="text" name="source" id="source" value="{{ old('source') }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    @error('source')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="destination" class="block text-gray-700 font-bold mb-2">Destination URL</label>
                    <input type="text" name="destination" id="destination" value="{{ old('destination') }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    @error('destination')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create</button>
                    <a href="{{ route('admin.redirects.index') }}" class="ml-4 text-gray-600">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
