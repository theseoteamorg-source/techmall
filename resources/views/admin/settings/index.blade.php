@extends('layouts.admin')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-8">Settings</h1>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-6" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold mb-6">General Settings</h2>
                    <div class="mb-6">
                        <label for="store_name" class="block text-gray-700 font-bold mb-2">Store Name</label>
                        <input type="text" name="store_name" id="store_name" value="{{ old('store_name', $settings['store_name']->value ?? '') }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-6">
                        <label for="address" class="block text-gray-700 font-bold mb-2">Address</label>
                        <input type="text" name="address" id="address" value="{{ old('address', $settings['address']->value ?? '') }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-6">
                        <label for="phone" class="block text-gray-700 font-bold mb-2">Phone</label>
                        <input type="text" name="phone" id="phone" value="{{ old('phone', $settings['phone']->value ?? '') }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-6">
                        <label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $settings['email']->value ?? '') }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold mb-6">SEO Settings</h2>
                    <div class="mb-6">
                        <label for="sitemap" class="block text-gray-700 font-bold mb-2">Sitemap URL</label>
                        <input type="text" name="sitemap" id="sitemap" value="{{ old('sitemap', $settings['sitemap']->value ?? '') }}" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="mb-6">
                        <label for="robots" class="block text-gray-700 font-bold mb-2">Robots.txt</label>
                        <textarea name="robots" id="robots" rows="10" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('robots', $settings['robots']->value ?? '') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="mt-8">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save Settings</button>
            </div>
        </form>
    </div>
@endsection
