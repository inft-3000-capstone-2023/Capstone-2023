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
                            <a class="nav-link" href="{{route('client.createS1', $client)}}">Basic Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('client.createS2', $client)}}">Ticket</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('client.createS3', $client)}}">Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('client.createS4', $client)}}">Publish</a>
                        </li>
                    </ul>
                    </div>

                    <div class="container-fluid col-10 pt-sm-2 pb-sm-2">
                    <h1>Publish</h1>
                    <hr>
                    <form class="row g-3" method="POST" action="{{route('client.postcreateS4', [$client, $event])}}">
                        @csrf
                        @method('PUT')

                        <div class="col-md-6">
                            <label for="event_title" class="form-label">Event Title</label>
                            <input type="text" name="event_title" class="form-control @error('event_title') is-invalid @enderror" id="event_title" value="{{old('event_title') ?? $event->event_title}}">
                            @error('event_title')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="event_description" class="form-label">Company Description</label>
                            <textarea class="form-control @error('event_description') is-invalid @enderror" name="event_description" id="event_description" rows="3">{{ old('event_description') ?? $event->event_description }}</textarea>
                            @error('event_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="date_time" class="form-label">Start Time</label>
                            <input type="datetime-local" name="date_time" class="form-control @error('date_time') is-invalid @enderror" id="date_time" value="{{old('date_time') ?? $event->date_time}}">
                            @error('date_time')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="end_time" class="form-label">End Time</label>
                            <input type="datetime-local" name="end_time" class="form-control @error('end_time') is-invalid @enderror" id="end_time" value="{{ old('end_time') ?? $event->end_time }}">
                            @error('end_time')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="time_zone" class="form-label">Time Zone</label>
                            <input type="text" class="form-control @error('time_zone') is-invalid @enderror" name="time_zone" id="time_zone" value="{{ old('time_zone') ?? $event->time_zone }}">
                            @error('time_zone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="venue" class="form-label">Venue</label>
                            <input type="text" class="form-control @error('venue') is-invalid @enderror" name="venue" id="venue" value="{{ old('venue') ?? $event->venue }}">
                            @error('venue')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Publish</button>
                            <button type="submit" class="btn btn-cancel" href="{{route('client.client_events', $client)}}">Back to Event</button>
                        </div>
                    </form>
                    </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
