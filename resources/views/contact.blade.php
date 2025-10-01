@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Contact Us</h1>
        <p>If you have any questions, please feel free to contact us using the information below:</p>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-6">
                <h3>Our Address</h3>
                <p>{{ $settings['address']->value ?? '' }}</p>

                <h3>Phone</h3>
                <p>{{ $settings['phone']->value ?? '' }}</p>

                <h3>Email</h3>
                <p>{{ $settings['email']->value ?? '' }}</p>
            </div>
            <div class="col-md-6">
                <h3>Contact Form</h3>
                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
@endsection
