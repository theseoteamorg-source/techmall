@extends('layouts.shop')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $page->title }}</h1>
                <p>{{ $page->body }}</p>
            </div>
        </div>
    </div>
@endsection
