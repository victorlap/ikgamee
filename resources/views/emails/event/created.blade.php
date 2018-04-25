@component('mail::message')
# Woehoe!

Je event {{ $event->name }} is aangemaakt!

Vraag snel of je vrienden ook kunnen op {{ $event->date->format('d-m-Y') }}, het is al over {{ $event->date->diffForHumans() }}.

Je kunt je event bereiken en delen via onderstaande knop.

@component('mail::button', ['url' => $event->link])
Ga naar je event
@endcomponent

@endcomponent
