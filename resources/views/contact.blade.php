@extends('layouts.frontend')

@section('content')
<style>
    .contact-us-container {
        background-color: #f8f9fa;
        padding: 60px 0;
    }

    .contact-us-card {
        background-color: #ffffff;
        border-radius: 15px;
        box-shadow: 0 10px 30px 0 rgba(0, 0, 0, 0.1);
        padding: 40px;
    }

    .contact-us-title {
        color: #212529;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .contact-us-subtitle {
        color: #6c757d;
        margin-bottom: 40px;
    }

    .contact-info-item {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .contact-info-icon {
        font-size: 24px;
        color: #007bff;
        margin-right: 15px;
    }

    .contact-form .form-control {
        border-radius: 10px;
        box-shadow: none;
        border: 1px solid #dee2e6;
        padding: 15px;
        transition: all 0.3s ease-in-out;
    }

    .contact-form .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 10px 0 rgba(0, 123, 255, 0.2);
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        border-radius: 10px;
        padding: 15px 30px;
        font-weight: 600;
        box-shadow: 0 4px 15px 0 rgba(0, 123, 255, 0.4);
        transition: all 0.3s ease-in-out;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        box-shadow: 0 6px 20px 0 rgba(0, 123, 255, 0.5);
    }
</style>

<div class="contact-us-container">
    <div class="container">
        <div class="contact-us-card">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="contact-us-title">Get in Touch</h1>
                    <p class="contact-us-subtitle">We'd love to hear from you. Here's how you can reach us.</p>

                    <div class="contact-info-item">
                        <i class="bi bi-geo-alt-fill contact-info-icon"></i>
                        <div>
                            <h2 class="h5 mb-0">Address</h2>
                            <p class="mb-0 text-muted">{{ $settings['address']->value ?? '' }}</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <i class="bi bi-telephone-fill contact-info-icon"></i>
                        <div>
                            <h2 class="h5 mb-0">Phone</h2>
                            <p class="mb-0 text-muted">{{ $settings['phone']->value ?? '' }}</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <i class="bi bi-envelope-fill contact-info-icon"></i>
                        <div>
                            <h2 class="h5 mb-0">Email</h2>
                            <p class="mb-0 text-muted">{{ $settings['email']->value ?? '' }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h2 class="h3 mb-3">Send a Message</h2>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('contact.send') }}" method="POST" class="contact-form">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="message">Message</label>
                            <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
