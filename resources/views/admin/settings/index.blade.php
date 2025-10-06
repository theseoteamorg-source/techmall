@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Settings</h1>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Update Settings</h3>
        </div>
        <div class="card-body">
            <form action="{{-- route('admin.settings.update') --}}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="site_name">Site Name</label>
                    <input type="text" name="site_name" id="site_name" class="form-control" value="{{-- $settings['site_name']->value ?? '' --}}">
                </div>
                <div class="form-group mb-3">
                    <label for="site_email">Site Email</label>
                    <input type="email" name="site_email" id="site_email" class="form-control" value="{{-- $settings['site_email']->value ?? '' --}}">
                </div>
                <div class="form-group mb-3">
                    <label for="site_phone">Site Phone</label>
                    <input type="text" name="site_phone" id="site_phone" class="form-control" value="{{-- $settings['site_phone']->value ?? '' --}}">
                </div>
                <div class="form-group mb-3">
                    <label for="site_address">Site Address</label>
                    <textarea name="site_address" id="site_address" class="form-control">{{-- $settings['site_address']->value ?? '' --}}</textarea>
                </div>
                <div class="form-group mb-3">
                    <label for="social_facebook">Facebook</label>
                    <input type="text" name="social_facebook" id="social_facebook" class="form-control" value="{{-- $settings['social_facebook']->value ?? '' --}}">
                </div>
                <div class="form-group mb-3">
                    <label for="social_twitter">Twitter</label>
                    <input type="text" name="social_twitter" id="social_twitter" class="form-control" value="{{-- $settings['social_twitter']->value ?? '' --}}">
                </div>
                <div class="form-group mb-3">
                    <label for="social_instagram">Instagram</label>
                    <input type="text" name="social_instagram" id="social_instagram" class="form-control" value="{{-- $settings['social_instagram']->value ?? '' --}}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
