@component('mail::message')
# Thanks you Confirm Payment Your Order at {{ config('app.name') }}<br>

Hi {{$checkout->name}},<br>
Your Transaction has been confirmed, now you can enjoy the benetfits details.
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
@component('mail::button', ['url' => route('member.index') ])
My Dashbaord
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
