@component('mail::message')
# Welcome to {{ config('app.name') }}<br>

Hi {{$user->name}}
<br>
<p class="text-justify"> you for register your account at {{ config('app.name') }}, Welcome and Thanks from us.</p>
<br>
<br>
Email : {{$user->email}}
<br>

For more information, visit click button
@component('mail::button', ['url' => 'http://coursecamp.com/login' ])
Course Camp
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
