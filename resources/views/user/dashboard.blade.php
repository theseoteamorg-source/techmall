@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-16">
    <div class="flex flex-wrap">
        <div class="w-full md:w-1/4">
            @include('user.partials.sidebar')
        </div>
        <div class="w-full md:w-3/4">
            <div class="bg-white shadow-lg rounded-lg p-8">
                <h1 class="text-2xl font-semibold text-gray-800 mb-6">Dashboard</h1>
                <p class="text-gray-600">Welcome to your dashboard, {{ Auth::user()->name }}!</p>
            </div>
        </div>
    </div>
</div>
@endsection
