@extends('layouts.frontend')

@section('content')
    <div class="container">
        <h1>Checkout</h1>
        <div class="row">
            <div class="col-md-8">
                <form action="{{ route('shop.placeOrder') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" name="city" id="city" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="postal_code">Postal Code</label>
                        <input type="text" name="postal_code" id="postal_code" class="form-control" required>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-primary">Place Order</button>
                </form>
            </div>
            <div class="col-md-4">
                <h3>Your Order</h3>
                <table class="table">
                    <tbody>
                    @php $total = 0 @endphp
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                            @php $total += $details['price'] * $details['quantity'] @endphp
                            <tr>
                                <td>{{ $details['name'] }} x {{ $details['quantity'] }}</td>
                                <td>${{ $details['price'] * $details['quantity'] }}</td>
                            </tr>
                        @endforeach
                    @endif
                    <tr>
                        <td><strong>Total</strong></td>
                        <td><strong>${{ $total }}</strong></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
