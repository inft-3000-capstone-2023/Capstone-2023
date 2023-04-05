@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

                <div class="container-fluid">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>Event</h1>

                    <nav class="navbar navbar-expand-lg bg-body-tertiary">
                        <div class="container-fluid">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="btn btn-outline-primary nav-link" href="{{route('client.createS1',$client)}}">Create new event</a>
                                    </li>
                                </ul>


                            </div>
                        </div>
                    </nav>

                        <nav>
                            <div class="nav nav-tabs pt-sm-2 pb-sm-2" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-calendar-tab" data-bs-toggle="tab" data-bs-target="#nav-calendar" type="button" role="tab" aria-controls="nav-calendar" aria-selected="true">Event Calendar</button>
                                <button class="nav-link" id="nav-listing-tab" data-bs-toggle="tab" data-bs-target="#nav-listing" type="button" role="tab" aria-controls="nav-listing" aria-selected="false">Event List</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-calendar" role="tabpanel" aria-labelledby="nav-calendar-tab" tabindex="0">
                                <div class="container-fluid pt-sm-2 pb-sm-2">
                                    <div id='calendar'>

                                    </div>
                                </div>

                                <script>
                                    $(document).ready(function() {
                                        $('#calendar').fullCalendar({
                                            header: {
                                                left: 'prev,next today',
                                                center: 'title',
                                                right: 'month,agendaWeek,agendaDay'
                                            },
                                            events: {!! json_encode($bookings) !!},
                                            timezone: 'local'
                                        });
                                    });
                                </script>
                            </div>
                            <div class="tab-pane fade" id="nav-listing" role="tabpanel" aria-labelledby="nav-listing-tab" tabindex="0">
                                <form class="d-flex pt-sm-2 pb-sm-2" role="search" method="GET" action="{{ route('client.search_events', $client) }}">
                                    <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                                <div id="event-listing pt-sm-2 pb-sm-2">
                                    @foreach($lists as $list)
                                        <div class="event">
                                            <h2>{{ $list['title'] }}</h2>
                                            <p>{{ $list['description'] }}</p>
                                            <p>Date & Time: {{ \Carbon\Carbon::parse($list['date_time'])->format('F j, Y, g:i A') }}</p>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>



                </div>

            </div>
        </div>
    </div>
@endsection
