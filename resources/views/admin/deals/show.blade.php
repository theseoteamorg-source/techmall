@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Deal Details</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $deal->name }}</h5>
                <p class="card-text"><strong>Deal Type:</strong> {{ ucfirst($deal->deal_type) }}</p>
                <p class="card-text"><strong>Discount:</strong> {{ $deal->discount_percentage }}%</p>
                <p class="card-text"><strong>Products:</strong></p>
                @if ($deal->deal_type == 'discount')
                    <p>{{ $deal->product->name ?? '' }}</p>
                @elseif ($deal->deal_type == 'combo')
                    <ul>
                        @foreach ($deal->comboProducts() as $product)
                            <li>{{ $product->name }}</li>
                        @endforeach
                    </ul>
                @endif
                <p class="card-text"><strong>Start Date:</strong> {{ $deal->start_date?->format('Y-m-d') }}</p>
                <p class="card-text"><strong>End Date:</strong> {{ $deal->end_date?->format('Y-m-d') }}</p>
            </div>
        </div>
        <a href="{{ route('admin.deals.index') }}" class="btn btn-primary mt-3">Back to Deals</a>
    </div>
@endsection
