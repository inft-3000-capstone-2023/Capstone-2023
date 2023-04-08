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
                            <a class="nav-link active" aria-current="page" href="{{route('client.createS2', $client)}}">Ticket</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('client.createS3', $client)}}">Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('client.createS4', $client)}}">Publish</a>
                        </li>
                    </ul>
                    </div>

                    <div class="container-fluid col-10 pt-sm-2 pb-sm-2">
                        <h1>Ticket</h1>
                        <hr>
                        <form class="row g-3" method="post" action="{{route('client.postcreateS2', $client)}}">
                            @csrf
                            <div class="col-12">
                                <label for="max_tickets_per_customer" class="form-label">Maximum tickets per customer</label>
                                <input type="number" name="max_tickets_per_customer" class="form-control @error('max_tickets_per_customer') is-invalid @enderror" id="max_tickets_per_customer" value="{{ $event->max_tickets_per_customer ?? '' }}">
                                @error('max_tickets_per_customer')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label for="ticket_price" class="form-label">Ticket price</label>
                                <input type="number" name="ticket_price" class="form-control @error('ticket_price') is-invalid @enderror" id="ticket_price" value="{{ $event->ticket_price ?? '' }}">
                                @error('ticket_price')
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
@endsection
