<table class="table">
    <thead style="background: rgba(0,0,0,0.8); color: white">
    <tr>
        <th width="20%">Firstname</th>
        <th width="20%">Lastname</th>
        <th width="40%">Email</th>
        <th width="20%">Option</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td colspan="4" style="padding: 8px 0">
            <div class="scrollit">
                <table style="font-family: 'Nunito', sans-serif; width: 100%">
                    @foreach($reservations as $reservation)
                        <tr>
                            <td width="20%">{{ $reservation->user->fname }}</td>
                            <td width="20%">{{ $reservation->user->lname }}</td>
                            <td width="40%">{{ $reservation->user->email }}</td>
                            <td width="20%">{{ $reservation->reservation_option->description }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </td>
    </tr>

    </tbody>
</table>
