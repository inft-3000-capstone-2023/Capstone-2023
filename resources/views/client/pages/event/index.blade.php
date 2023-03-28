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
                                <form class="d-flex" role="search">
                                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit">Search</button>
                                </form>
                            </div>
                        </div>
                    </nav>


                    <div class="container-fluid pt-sm-2">
                        <div id='calendar'>

                        </div>
                    </div>

                    <script>
                        $(document).ready(function() {
                            let event = @json($bookings);
                            console.log(event);
                            $('#calendar').fullCalendar({
                                header: {
                                    left:'prev, next today',
                                    center: 'title',
                                    right:'month, agendaWeek, agendaDay',
                                },

                                events: event
                            })
                        });
                    </script>

                </div>

            </div>
        </div>
    </div>
@endsection
