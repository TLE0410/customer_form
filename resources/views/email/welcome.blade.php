@component('mail::message')
# Dear {{ $customer->name }}

thank you for give me more information

Thanks,<br>
{{ config('app.name') }}
@endcomponent
