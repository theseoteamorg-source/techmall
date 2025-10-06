@extends('layouts.app')

@section('title', $page->title)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $page->title }}</h1>
                <div class="card">
                    <div class="card-body">
                        {!! $page->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
