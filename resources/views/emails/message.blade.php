@component('mail::message')
# You received a Message

<p>{{ $myText }}<br />
    "{{ $myMessage }}"</p>


@component('mail::button', ['url' => 'theride.info'])
Open TheRide
@endcomponent

@endcomponent
