@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Events
                            <a href="{{ route('event.create') }}" class="btn btn-primary float-end">Create event</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="w-100">
                            <tbody>
                            @foreach($events as $event)
                                <tr>
                                    <td width="50%" style="padding-bottom: 10px"><a href="events/{{ $event->id }}">{{ $event->description }}</a></td>
                                    <td width="50%" style="padding-bottom: 10px">
                                        <a class="btn btn-primary" href="{{ route('event.edit', ['event'=>$event]) }}">Edit</a>
                                        <form style="display: inline" action="{{ route('event.destroy', ['event'=>$event]) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <input class="btn btn-danger" type="submit" value="Delete">
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
