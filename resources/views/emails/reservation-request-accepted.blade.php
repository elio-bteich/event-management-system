@component('mail::message')
    # Welcome to MWD Management

    We would like to inform you that your {{ $reservation->reservation_option->description }} reservation request to our event "{{ $reservation->event->description }}" has been accepted.
    Here's your ticket attached to this mail.

    MWD Management
@endcomponent