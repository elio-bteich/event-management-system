@component('mail::message')
# Welcome to MWD Management

This is the email verification code required to be able to proceed with the reservation request:

<h1 style="text-align: center">{{ $verification_code }}</h1>

Thanks,<br>
MWD Management
@endcomponent
