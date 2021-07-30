@component('mail::message')
# You received a Notification

{{ $myText }}

@component('mail::button', ['url' => 'theride.info'])
Open TheRide
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
