@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Settings</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <form action="{{ route('admin.settings.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold mb-6">General Settings</h2>
                    <div class="mb-6">
                        <label for="store_name" class="block text-gray-700 font-bold mb-2">Store Name</label>
                        <input type="text" name="store_name" id="store_name" value="{{ old('store_name', $settings['store_name'] ?? '') }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('store_name')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold mb-6">SEO Settings</h2>
                    <div class="mb-6">
                        <label for="sitemap" class="block text-gray-700 font-bold mb-2">Sitemap URL</label>
                        <input type="text" name="sitemap" id="sitemap" value="{{ old('sitemap', $settings['sitemap'] ?? '') }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        @error('sitemap')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="robots" class="block text-gray-700 font-bold mb-2">Robots.txt</label>
                        <textarea name="robots" id="robots" rows="10" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('robots', $settings['robots'] ?? '') }}</textarea>
                        @error('robots')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mt-8">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save Settings</button>
            </div>
        </form>
    </div>
@endsection
