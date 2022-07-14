@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Admins <a href="{{ route('admin.manage-users') }}" class="btn btn-primary float-end">Manage Users</a></h4>
                    </div>
                    <div class="card-body">
                        <table class="w-100">
                            <tbody>
                            @foreach($admins as $admin)
                                <tr>
                                    <td width="25%" style="padding-bottom: 10px">{{ $admin->fname }}</td>
                                    <td width="25%" style="padding-bottom: 10px">{{ $admin->lname }}</td>
                                    <td width="25%" style="padding-bottom: 10px">{{ $admin->email }}</td>
                                    <td width="25%" style="padding-bottom: 10px; text-align: center">
                                        <form action="/admin/demote/{{$admin->id}}" method="POST" onsubmit="event.preventDefault();">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $admin->id }}">
                                            <input type="submit" name="action" class="btn btn-danger demote-btn" value="Demote">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).on('click', '.demote-btn', function (e){
            $.ajax({
                url: $(e.target).parent('form').attr('action'),
                type: 'GET',
                success: function (data) {
                    $($(e.target).parents('tr')[0]).remove()
                }
            })
        })
    </script>
@endsection
