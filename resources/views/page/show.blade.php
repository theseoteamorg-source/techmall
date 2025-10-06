@extends('layouts.app')

@section('title', $page->meta_title ?? $page->title)
@section('meta_description', $page->meta_description)

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $page->title }}</h1>
                <div>
                    {!! $page->content !!}
                </div>
            </div>
        </div>
    </div>
@endsection
