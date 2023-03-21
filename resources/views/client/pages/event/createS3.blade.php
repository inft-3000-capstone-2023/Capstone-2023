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
                            <a class="nav-link" href="{{route('events.createS2')}}">Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('events.createS3')}}">Ticket</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('events.createS4')}}">Publish</a>
                        </li>
                    </ul>
                    </div>

                    <div class="container-fluid col-10 pt-sm-2 pb-sm-2">
                    <h1>Ticket</h1>
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
                    <form class="row g-3" method="post" action="{{route('events.createS3.post')}}">

                        <div class="col-12">
                            <label for="max_tickets_per_customer" class="form-label">Maximum tickets per customer</label>
                            <input type="number" class="form-control" id="max_tickets_per_customer" value="{{ $event->max_tickets_per_customer ?? '' }}">
                        </div>
                        <div class="col-12">
                            <label for="ticket_price" class="form-label">Ticket price</label>
                            <input type="number" class="form-control" id="ticket_price" value="{{ $event->ticket_price ?? '' }}">
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
