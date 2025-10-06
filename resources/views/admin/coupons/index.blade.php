@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Coupons</h4>
                    <div class="card-tools">
                        <a href="{{ route('admin.coupons.create') }}" class="btn btn-primary">Add Coupon</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Type</th>
                                <th>Value</th>
                                <th>Expires At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($coupons as $coupon)
                            <tr>
                                <td>{{ $coupon->code }}</td>
                                <td>{{ $coupon->type }}</td>
                                <td>{{ $coupon->value }}</td>
                                <td>{{ $coupon->expires_at ? $coupon->expires_at->format('Y-m-d') : 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('admin.coupons.edit', $coupon->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('admin.coupons.destroy', $coupon->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
