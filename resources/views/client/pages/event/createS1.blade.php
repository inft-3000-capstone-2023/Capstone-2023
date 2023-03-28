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
                            <a class="nav-link active" aria-current="page" href="{{route('client.createS1', $client)}}">Basic Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('client.createS2', $client)}}">Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('client.createS3', $client)}}">Ticket</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('client.createS4', $client)}}">Publish</a>
                        </li>
                    </ul>
                    </div>

                    <div class="container-fluid col-10 pt-sm-2 pb-sm-2">
                    <h1>Basic Info</h1>
                    <hr>
                    <form class="row g-3" method="post" action="{{route('client.postcreateS1',$client)}}">
                        @csrf
                        <div class="col-md-6">
                            <label for="event_title" class="form-label">Event Title</label>
                            <input type="text" name="event_title" required class="form-control @error('event_title') is-invalid @enderror" id="event_title" value="{{ $event->event_title ?? '' }}">
                            @error('event_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="event_description" class="form-label">Event Description</label>
                            <textarea name="event_description" class="form-control @error('event_description') is-invalid @enderror" id="event_description" rows="3" value="{{ $event->event_description ?? '' }}"></textarea>
                            @error('event_description')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="street" class="form-label">Street</label>
                            <input type="text" name="street" required class="form-control @error('street') is-invalid @enderror" id="street" value="{{ $event->street ?? '' }}" >
                            @error('street')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="city" class="form-label">City</label>
                            <input type="text" name="city" required class="form-control @error('city') is-invalid @enderror" id="city" value="{{ $event->city ?? '' }}">
                            @error('city')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-4">
                            <label for="province" class="form-label">Province</label>
                            <input type="text" name="province" required class="form-control @error('province') is-invalid @enderror" id="province" value="{{ $event->province ?? '' }}">
                            @error('province')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-2">
                            <label for="postal_code" class="form-label">Postal Code</label>
                            <input type="text" name="postal_code" required class="form-control @error('postal_code') is-invalid @enderror" id="postal_code" value="{{ $event->postal_code ?? '' }}">
                            @error('postal_code')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="date_time" class="form-label">Date-Time</label>
                            <input type="datetime-local" name="date_time" required class="form-control @error('date_time') is-invalid @enderror" id="date_time" value="{{ $event->date_time ?? '' }}">
                            @error('date_time')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="time_zone" class="form-label">Time Zone</label>
                            <input type="text" name="time_zone" required class="form-control @error('time_zone') is-invalid @enderror" id="time_zone" value="{{ $event->time_zone ?? '' }}">
                            @error('time_zone')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
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
