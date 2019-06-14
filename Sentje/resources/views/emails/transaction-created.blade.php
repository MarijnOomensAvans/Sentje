@component('mail::message')
<h1>{{ __('mail.hello') }} {{ $transaction['name'] }}</h1>

<h3>{{ __('mail.paymentrequest') }}</h3>

<b>{{ __('mail.description') }}:</b><p>{{ $transaction['description'] }}</p>

<b>{{ __('mail.amount') }}:</b><p>{{ $transaction['amount'] }} @if($transaction['currency'] == 'EUR')€@else₽@endif</p>

@component('mail::button', ['url' => 'https://www.yandex.ru'])
    {{ __('mail.pay') }}
@endcomponent

{{ __('mail.thanks') }},<br>
{{ Auth::user()->name }}
@endcomponent
