@extends('layouts.app')

@section('content')

    <div class="container">
        @if(session('success'))
            <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Event
                            <a href="{{ route('event.index') }}" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('event.update', ['event' => $event]) }}" method="POST" enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <input type="text" id="description" name="description" class="form-control" value="{{$event->description}}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="location">Location</label>
                                <input type="text" id="location" name="location" class="form-control" value="{{ $event->location }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="date">Date</label>
                                <input type="date" id="date" name="date" class="form-control" value="{{ $event->date }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <div class="row mb-3" style="--bs-gutter-x: 0; margin: 0;">
                                    <div class="col-12" style="padding-right: 20px;">
                                        <label for="start_time">Start Time</label>
                                        <input type="time" id="start_time" name="start_time" value="{{ $event->start_time }}" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3" id="options-container">
                                <label for="flyer">Options</label>
                                @foreach($event->reservation_options as $reservation_option)
                                    <div class="row mb-3" style="--bs-gutter-x: 0; margin: 0;">
                                        <input type="hidden" name="old_options_id[]" value="{{ $reservation_option->id }}">
                                        <div class="col-5" style="padding-right: 20px;">
                                            <input type="text" id="option_description" name="old_options_descriptions[]" value="{{ $reservation_option->description }}" placeholder="Description" class="form-control" required>
                                        </div>
                                        <div class="col-3" style="padding-left: 20px;">
                                            <input type="text" name="old_options_prices[]" value="{{ $reservation_option->price }}" placeholder="Price" class="form-control" required>
                                        </div>
                                        <div class="col-2" style="padding-left: 40px;">
                                            <input type="number" name="old_min_capacities[]" value="{{ $reservation_option->min_capacity }}" placeholder="Min Cap" class="form-control">
                                        </div>
                                        <div class="col-2" style="padding-left: 40px;">
                                            <input type="number" name="old_max_capacities[]" value="{{ $reservation_option->max_capacity }}" placeholder="Max Cap" class="form-control">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row justify-content-end" style="--bs-gutter-x: 0; margin: 0;">
                                <div class="col-3">
                                    <button id="add-option-btn" class="btn btn-primary my-3 float-end">Add Option</button>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="flyer">Flyer</label>
                                <input type="file" id="flyer" name="flyer_image" class="form-control" value="{{$event->flyer_image}}">
                            </div>
                            <div class="my-5">
                                <label class="radio-inline"><input type="radio" name="active" value="1" {{ $event->active==1 ? 'checked' : '' }}>Active</label>
                                <label class="radio-inline"><input type="radio" name="active" value="0" {{ $event->active==0 ? 'checked' : '' }}>Passive</label>
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#add-option-btn').on('click', function(e){
            e.preventDefault()
            $('#options-container').append(`<div class="row mb-3" style="--bs-gutter-x: 0; margin: 0;">
                                    <div class="col-4" style="padding-right: 20px;">
                                        <input type="text" id="option_description" name="new_options_descriptions[]" placeholder="Description" class="form-control">
                                    </div>
                                    <div class="col-3" style="padding-left: 20px;">
                                        <input type="text" name="new_options_prices[]" placeholder="Price" class="form-control">
                                    </div>
                                    <div class="col-2" style="padding-left: 40px;">
                                        <input type="number" name="new_min_capacities[]" placeholder="Min Cap" class="form-control">
                                    </div>
                                    <div class="col-2" style="padding-left: 40px;">
                                        <input type="number" name="new_max_capacities[]" placeholder="Max Cap" class="form-control">
                                    </div>
                                    <div class="col-1" style="padding-left: 20px; text-align: right">
                                        <button class="btn btn-danger delete-btn"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </div>
                                </div>`)
        })
        $(document).on('click', '.delete-btn', function(e){
            e.preventDefault()
            $($(e.target).closest('.row')[0]).remove()
        })
    </script>

@endsection
