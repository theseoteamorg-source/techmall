@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add Coupon</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.coupons.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="code">Code</label>
                            <input type="text" name="code" id="code" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select name="type" id="type" class="form-control" required>
                                <option value="fixed">Fixed</option>
                                <option value="percent">Percent</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="value">Value</label>
                            <input type="text" name="value" id="value" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="expires_at">Expires At</label>
                            <input type="date" name="expires_at" id="expires_at" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Add Coupon</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
