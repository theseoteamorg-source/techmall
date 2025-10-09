@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Settings</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.settings.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="store_name">Store Name</label>
                                <input type="text" name="store_name" id="store_name" class="form-control" value="{{ $setting->store_name ?? '' }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="logo">Logo</label>
                                <input type="file" name="logo" id="logo" class="form-control">
                                @if ($setting && $setting->logo)
                                    <img src="{{ asset('storage/' . $setting->logo) }}" alt="Logo" class="img-thumbnail mt-2" width="200">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="theme_color">Theme Color</label>
                                <input type="color" name="theme_color" id="theme_color" class="form-control" value="{{ $setting->theme_color ?? '#007bff' }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="currency">Currency</label>
                                <select name="currency" id="currency" class="form-control">
                                    @foreach ($currencies as $currency)
                                        <option value="{{ $currency->code }}" {{ ($setting && $setting->currency == $currency->code) ? 'selected' : '' }}>
                                            {{ $currency->name }} ({{ $currency->symbol }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ga_id">Google Analytics 4 ID</label>
                                <input type="text" name="ga_id" id="ga_id" class="form-control" value="{{ $setting->ga_id ?? '' }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="header_scripts">Header Scripts</label>
                                <textarea name="header_scripts" id="header_scripts" class="form-control" rows="5">{{ $setting->header_scripts ?? '' }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="footer_scripts">Footer Scripts</label>
                                <textarea name="footer_scripts" id="footer_scripts" class="form-control" rows="5">{{ $setting->footer_scripts ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Save Settings</button>
                </form>
                <hr>
                <div class="mt-4">
                    <h4>System Tools</h4>
                    <a href="{{ route('admin.settings.clear-cache') }}" class="btn btn-warning">Clear Cache</a>
                </div>
            </div>
        </div>
    </div>
@endsection
