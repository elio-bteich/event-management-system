@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Admin Dashboard <a href="{{ route('admin.add-admin') }}" class="btn btn-primary float-end">Add Admin</a></h4>
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
                                        <form style="display: inline" action="{{ route('admin.demote', ['user'=>$admin->id]) }}" method="post">
                                            @method('patch')
                                            @csrf
                                            <input class="btn btn-danger" type="submit" value="Demote">
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

@endsection
