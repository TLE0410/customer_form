@component('mail::message')
# Dear {{ $customer->name }}

thank you for subscribe my web

Thanks,<br>
{{ config('app.name') }}
@endcomponent
