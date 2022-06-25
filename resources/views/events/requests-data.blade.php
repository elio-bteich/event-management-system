<table class="table">
    <thead style="background: rgba(0,0,0,0.8); color: white">
    <tr>
        <th width="15%">Firstname</th>
        <th width="15%">Lastname</th>
        <th width="25%">Email</th>
        <th width="15%">PhoneNumber</th>
        <th width="10%">Option</th>
        <th width="20%">Action</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td colspan="6" style="padding: 0">
            <div class="scrollit">
                <table style="font-family: 'Nunito', sans-serif; width: 100%">
                    @foreach($requests as $request)
                        <tr>
                            <td width="15%">{{ $request->user->fname }}</td>
                            <td width="15%">{{ $request->user->lname }}</td>
                            <td width="25%">{{ $request->user->email }}</td>
                            <td width="15%">{{ $request->user->phone_number }}</td>
                            <td width="10%">{{ $request->reservation_option->description }}</td>
                            <td style="white-space: nowrap" width="20%">
                                <form action="/events/{{$request->event_id}}/request/{{$request->id}}" method="POST" onsubmit="event.preventDefault();">
                                    @csrf
                                    <input type="submit" name="action" class="btn btn-primary" value="Accept">
                                    <input type="submit" name="action" class="btn btn-danger" value="Decline">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </td>
    </tr>

    </tbody>
</table>
<script>
    $('input[value=Accept]').on('click', function(e) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: $($(this)[0].parentElement).attr('action') + '/accept',
            method: 'POST',
            success: function (data) {
                $($(e.target).closest('tr')[0]).remove()
                increaseReservationsCount()
                decreaseRequestsCount()
            }
        })
    })

    $('input[value=Decline]').on('click', function(e) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: $($(this)[0].parentElement).attr('action') + '/decline',
            method: 'POST',
            success: function (data) {
                $($(e.target).closest('tr')[0]).remove()
                decreaseRequestsCount()
            }
        })
    })

    function increaseReservationsCount() {
        $('#reservations-count').html(parseInt($('#reservations-count').html())+1)
    }

    function decreaseRequestsCount() {
        $('#requests-count').html(parseInt($('#requests-count').html())-1)
    }
</script>