@extends('layouts.app')

@section('content')
    <style>
        .fname-div, .lname-div {
            padding: 10px 30px;
        }

        .email-div {
            padding: 10px 30px 50px 30px;
        }

        td {
            padding: 8px;
        }
    </style>

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Manage Users <a href="/admin" class="btn btn-primary float-end">Back</a></h4>
                    </div>
                    <div class="card-body">
                        <div class="row names-div">
                            <div class="col-6 fname-div">
                                <label for="fname">First Name:</label>
                                <input type="text" class="form-control" id="fname" name="fname">
                            </div>
                            <div class="col-6 lname-div">
                                <label for="lname">Last Name:</label>
                                <input type="text" class="form-control" id="lname" name="lname">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 email-div">
                                <label>Email Address:</label>
                                <input type="email" class="form-control" name="email" id="email">
                            </div>
                        </div>
                        <table class="table">
                            <thead style="background: rgba(0,0,0,0.8); color: white">
                            <tr>
                                <th width="22%">Firstname</th>
                                <th width="22%">Lastname</th>
                                <th width="35%">Email</th>
                                <th width="21%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td colspan="4" style="padding: 0">
                                    <div class="scrollit">
                                        <table id="users_table" style="font-family: 'Nunito', sans-serif; width: 100%">

                                        </table>
                                    </div>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('input[name=fname], input[name=lname], input[name=email]').keyup(function (e) {
            let targetValue = $.trim(e.target.value)
            if (targetValue){
                let fname = $.trim($('input[name=fname]').val()).toLowerCase()
                let lname = $.trim($('input[name=lname]').val()).toLowerCase()
                let email = $.trim($('input[name=email]').val()).toLowerCase()
                fname = fname !== '' ? fname : null
                lname = lname !== '' ? lname : null
                email = email !== '' ? email : null
                $.ajax({
                    url: '/admin/fetch_users/'+fname+'/'+lname+'/'+email,
                    type: 'GET',
                    success: function (data){
                        $('#users_table').html(data)
                    }
                })
            }
        })
    </script>
@endsection
