@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Coupon</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.coupons.update', $coupon->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="code">Code</label>
                            <input type="text" name="code" id="code" class="form-control" value="{{ $coupon->code }}" required>
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select name="type" id="type" class="form-control" required>
                                <option value="fixed" {{ $coupon->type == 'fixed' ? 'selected' : '' }}>Fixed</option>
                                <option value="percent" {{ $coupon->type == 'percent' ? 'selected' : '' }}>Percent</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="value">Value</label>
                            <input type="text" name="value" id="value" class="form-control" value="{{ $coupon->value }}" required>
                        </div>
                        <div class="form-group">
                            <label for="expires_at">Expires At</label>
                            <input type="date" name="expires_at" id="expires_at" class="form-control" value="{{ $coupon->expires_at ? $coupon->expires_at->format('Y-m-d') : '' }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Coupon</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
