@extends('layouts.app')

@section('content')

    <style></style>

    <div class="container">
        @if(session('success'))
            <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif
        <div class="row">
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

@endsection
