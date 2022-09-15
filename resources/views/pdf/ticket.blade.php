<html lang="en">
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket</title>
    <style>
        img { 
            margin: auto;
        }

        body {
            font-family: 'Helvetica', 'Arial', sans-serif;
            font-size: 13px;
        }
    </style>
</head>
<body>
    <h1>MWD Ticket</h1>
    <hr>
    <h3 style="text-decoration: underline">Attendee Information:</h3>
    <p>First Name: {{ $reservation->user->fname }}</p>
    <p>Last Name: {{ $reservation->user->lname }}</p>
    <p>Email Address: {{ $reservation->user->email }}</p>
    <hr>
    <h3 style="text-decoration: underline">Event Information:</h3>
    <table>
        <tr>
            <td width="300px">
                <p>Description: {{ $reservation->event->description }}</p>
                <br>
                <p>Location: {{ $reservation->event->location }}</p>
                <br>
                <p>Date: {{ $reservation->event->date }}</p>
                <br>
                <p>Start Time: {{ $reservation->event->start_time }}</p>
                <br>
                <p>Option: {{ $reservation->reservation_option->description }}</p>
                <br>
                <p>Price: {{ $reservation->reservation_option->price }}</p>
            </td>
            <td width="150px">
                <img width="150px" height="200px" src="{{ $path_event_flyer }}" alt=" ">
            </td>
        </tr>
    </table>
    
    <hr>
    <br>
    <table style="width:100%;">
        <tr>
            <td align="center">
                <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate($reservation->ticket_code)) !!} ">
            </td>
        </tr>
    </table>
    <br>
    <p>NB: This QR code can be used 1 time</p>
</body>
</html> 