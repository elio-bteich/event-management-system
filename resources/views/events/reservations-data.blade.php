<table class="table">
    <thead style="background: rgba(0,0,0,0.8); color: white">
    <tr>
        <th width="20%">Firstname</th>
        <th width="20%">Lastname</th>
        <th width="30%">Email</th>
        <th width="30%">PhoneNumber</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td colspan="4">
            <div class="scrollit">
                <table style="font-family: 'Nunito', sans-serif">
                    @foreach($reservations as $reservation)
                        <tr>
                            <td width="20%">{{ $reservation->fname }}</td>
                            <td width="20%">{{ $reservation->lname }}</td>
                            <td width="30%">{{ $reservation->email }}</td>
                            <td width="30%">{{ $reservation->phone_number }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </td>
    </tr>

    </tbody>
</table>
