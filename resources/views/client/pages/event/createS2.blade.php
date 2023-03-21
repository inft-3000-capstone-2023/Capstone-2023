@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">{{ __('Event') }}</div>

                    <div class="container col-10 pt-sm-2">
                    <ul class="nav nav-pills nav-fill">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('events.createS1')}}">Basic Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('events.createS2')}}">Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('events.createS3')}}">Ticket</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('events.createS4')}}">Publish</a>
                        </li>
                    </ul>
                    </div>

                    <div class="container-fluid col-10 pt-sm-2 pb-sm-2">
                    <h1>Details</h1>
                    <hr>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    <form class="row g-3" method="post" action="{{route('events.createS2.post')}}">
                        @csrf
                        <div class="col-12">
                            <label for="path" class="form-label">Main Event Image</label>
                            <input class="form-control" type="file" id="path" value="{{ $event->path ?? '' }}">
                        </div>

                        <div class="col-12">
                            <label for="alt_text" class="form-label">Summary</label>
                            <textarea class="form-control" id="alt_text" rows="3" value="{{ $event->alt_text ?? '' }}"></textarea>
                        </div>

                        <div class="col-12">
                            <label for="description" class="form-label">More description</label>
                            <textarea class="form-control" id="description" rows="3" value="{{ $event->description ?? '' }}"></textarea>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary" name="next">Next</button>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
