@component('mail::message')
# Your Order Has Shipped!

Great news! Your order is on its way.

Here's a tracking link to follow its journey:

@component('mail::button', ['url' => $order->tracking_url])
Track Your Order
@endcomponent

Thanks,
{{ config('app.name') }}
@endcomponent
