<table class="table">
    <thead style="background: rgba(0,0,0,0.8); color: white">
    <tr>
        <th width="15%">Firstname</th>
        <th width="15%">Lastname</th>
        <th width="30%">Email</th>
        <th width="25%">PhoneNumber</th>
        <th width="15%">Option</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td colspan="5" style="padding: 8px 0">
            <div class="scrollit">
                <table style="font-family: 'Nunito', sans-serif; width: 100%">
                    @foreach($reservations as $reservation)
                        <tr>
                            <td width="15%">{{ $reservation->user->fname }}</td>
                            <td width="15%">{{ $reservation->user->lname }}</td>
                            <td width="30%">{{ $reservation->user->email }}</td>
                            <td width="25%">{{ $reservation->user->phone_number }}</td>
                            <td width="15%">{{ $reservation->reservation_option->description }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </td>
    </tr>

    </tbody>
</table>
