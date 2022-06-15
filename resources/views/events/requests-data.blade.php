<table class="table">
    <thead style="background: rgba(0,0,0,0.8); color: white">
    <tr>
        <th width="15%">Firstname</th>
        <th width="15%">Lastname</th>
        <th width="25%">Email</th>
        <th width="25%">PhoneNumber</th>
        <th width="20%">Action</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td colspan="4">
            <div class="scrollit">
                <table style="font-family: 'Nunito', sans-serif">
                    @foreach($requests as $request)
                        <tr>
                            <td width="15%">{{ $request->fname }}</td>
                            <td width="15%">{{ $request->lname }}</td>
                            <td width="25%">{{ $request->email }}</td>
                            <td width="25%">{{ $request->phone_number }}</td>
                            <td style="white-space: nowrap" width="20%">
                                <form action="/event/{{$request->event_id}}/request/{{$request->id}}" method="POST">
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
