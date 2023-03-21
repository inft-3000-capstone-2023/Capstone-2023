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
                            <a class="nav-link active" aria-current="page" href="{{route('events.createS1')}}">Basic Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('events.createS2')}}">Details</a>
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
                    <h1>Basic Info</h1>
                    <hr>
                    <form class="row g-3" method="post" action="{{route('events.createS1.post')}}">
                        @csrf
                        <div class="col-md-6">
                            <label for="event_title" class="form-label">Event Title</label>
                            <input type="email" class="form-control" id="event_title" value="{{ $event->event_title ?? '' }}">
                            @error('event_title')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="event_description" class="form-label">Event Description</label>
                            <textarea class="form-control" id="event_description" rows="3" value="{{ $event->event_description ?? '' }}"></textarea>
                            @error('event_description')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="street" class="form-label">Street</label>
                            <input type="text" class="form-control" id="street" value="{{ $event->street ?? '' }}" >
                            @error('street')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" value="{{ $event->city ?? '' }}">
                            @error('city')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="province" class="form-label">Province</label>
                            <input type="text" class="form-control" id="province" value="{{ $event->province ?? '' }}">
                            @error('province')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-md-2">
                            <label for="postal_code" class="form-label">Postal Code</label>
                            <input type="text" class="form-control" id="postal_code" value="{{ $event->postal_code ?? '' }}">
                            @error('postal_code')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="date_time" class="form-label">Date-Time</label>
                            <input type="datetime-local" class="form-control" id="date_time" value="{{ $event->date_time ?? '' }}">
                            @error('date_time')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="time_zone" class="form-label">Time Zone</label>
                            <input type="text" class="form-control" id="time_zone" value="{{ $event->date_time ?? '' }}">
                            @error('time_zone')
                            <div class="alert alert-danger">{{$message}}</div>
                            @enderror
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
