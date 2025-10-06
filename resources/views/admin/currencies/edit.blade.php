@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Currency</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.currencies.update', $currency->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" name="country" class="form-control" value="{{ $currency->country }}" required>
                        </div>
                        <div class="form-group">
                            <label for="currency_code">Currency Code</label>
                            <input type="text" name="currency_code" class="form-control" value="{{ $currency->currency_code }}" required>
                        </div>
                        <div class="form-group">
                            <label for="currency_name">Currency Name</label>
                            <input type="text" name="currency_name" class="form-control" value="{{ $currency->currency_name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="exchange_rate">Exchange Rate</label>
                            <input type="text" name="exchange_rate" class="form-control" value="{{ $currency->exchange_rate }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
