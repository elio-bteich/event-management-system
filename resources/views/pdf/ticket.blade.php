<!DOCTYPE html>
<html>
<body>
    <h1>MWD Ticket</h1>
    <h3 style="text-decoration: underline">Attendee Information:</h3>
    <p>First Name: {{ $reservation->user->fname }}</p>
    <p>Last Name: {{ $reservation->user->lname }}</p>
    <p>Email Address: {{ $reservation->user->email }}</p>
    <hr>
    <h3 style="text-decoration: underline">Event Information</h3>
    <p>Description: {{ $reservation->event->description }}</p>
    <p>Location: {{ $reservation->event->location }}</p>
    <p>Date: {{ $reservation->event->date }}</p>
    <p>Start Time: {{ $reservation->event->start_time }}</p>
    <p>Option: {{ $reservation->reservation_option->description }}</p>
    <hr>
 {{ QrCode::encoding('UTF-8')->size(150)->generate($reservation->ticket_code) }}
</body>
</html> 