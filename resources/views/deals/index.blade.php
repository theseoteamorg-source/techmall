@extends('layouts.frontend')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-5">Deals of the Day</h1>

    @if($deals->isEmpty())
        <div class="alert alert-info text-center">
            <h2>There are no active deals at the moment. Please check back later!</h2>
        </div>
    @else
        @foreach($deals as $deal)
        <div class="deal-section mb-5">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h2 class="h4 mb-0">{{ $deal->name }}</h2>
                    <div class="countdown" data-end-date="{{ $deal->end_date->toIso8601String() }}">
                        <span class="h5">Ends in:</span>
                        <span class="timer btn btn-light btn-sm"></span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        @forelse($deal->products as $product)
                            <x-product-card :product="$product" class="col-lg-3 col-md-6 mb-4" />
                        @empty
                            <div class="col-12">
                                <p class="text-center">No products found for this deal.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @endif
</div>
@endsection

@push('styles')
<style>
    .deal-section .card {
        border-radius: 15px;
        border: none;
    }
    .deal-section .card-header {
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const countdowns = document.querySelectorAll('.countdown');

        countdowns.forEach(countdown => {
            const endDate = new Date(countdown.dataset.endDate).getTime();
            const timer = countdown.querySelector('.timer');

            const interval = setInterval(function() {
                const now = new Date().getTime();
                const distance = endDate - now;

                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                timer.innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";

                if (distance < 0) {
                    clearInterval(interval);
                    timer.innerHTML = "EXPIRED";
                }
            }, 1000);
        });
    });
</script>
@endpush
