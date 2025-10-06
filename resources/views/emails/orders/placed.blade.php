@component('mail::message')
# Order Confirmation

Thank you for your order!

Here are your order details:

@component('mail::table')
| Product       | Quantity      | Price  |
|:--------------|:--------------|:-------|
@foreach($order->items as $item)
| {{ $item->product->name }} | {{ $item->quantity }} | {{ format_price($item->price) }} |
@endforeach
@endcomponent

**Total:** {{ format_price($order->total) }}

Thanks,
{{ config('app.name') }}
@endcomponent
