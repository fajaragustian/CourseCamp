@component('mail::message')
# Confirm Order of Service at {{ config('app.name') }}<br>

Hi {{$checkout->name}},<br>
We have received the Order, your order data is as follows :
<br>
Order Number :
<br>
Product/Service : Course Camp {{ $checkout->camp->title }}<br>
Price : Rp. {{ $checkout->camp->price }}
<br>
<p class="text-justify"> Thanks you for Order Course at {{ config('app.name') }}, Welcome and Thanks from us.</p>
<br>
<br>

For more information, visit click button
@component('mail::button', ['url' => route('member.checkout.invoice',$checkout->id) ])
Course Camp
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
