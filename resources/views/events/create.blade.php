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
                        <h4>Add Event
                            <a href="{{ route('event.index') }}" class="btn btn-primary float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <input type="text" id="description" name="description" class="form-control" required>
                            </div>
                            <div class="form-group mb-3" id="options-container">
                                <label for="flyer">Options</label>
                                <div class="row mb-3" style="--bs-gutter-x: 0; margin: 0;">
                                    <div class="col-6" style="padding-right: 20px;">
                                        <input type="text" id="option_description" name="options_descriptions[]" placeholder="Description" class="form-control">
                                    </div>
                                    <div class="col-6" style="padding-left: 20px;">
                                        <input type="text" id="option_price" name="options_prices[]" placeholder="Price" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end" style="--bs-gutter-x: 0; margin: 0;">
                                <div class="col-3">
                                    <button id="add-option-btn" class="btn btn-primary my-3 float-end">Add Option</button>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="flyer">Flyer</label>
                                <input type="file" id="flyer" name="flyer_image" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Add</button>
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
                <div class="col-6" style="padding-right: 20px;">
                <input type="text" id="option_description" name="options_descriptions[]" placeholder="Description" class="form-control">
                </div>
            <div class="col-6" style="padding-left: 20px;">
                <input type="text" id="option_price" name="options_prices[]" placeholder="Price" class="form-control">
            </div>
        </div>`)
        })
    </script>

@endsection
