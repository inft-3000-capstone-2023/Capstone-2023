@extends('customer.layouts.app')

@section('content')
    <div class="container-fluid home-hero text-center px-lg-5 py-lg-5" style="background-image: url({{URL::asset('img/default/banner_background.jpg')}})">
        <link rel="stylesheet" href="{{ URL::asset('css/customer_home.css') }}"/>
        <div class="row align-items-end">
            <div class="container col-7">
                <div class="row mb-4">
                    <h1>{{$event->event_title}}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-12 text-center">
                <img class="img-fluid" src="{{URL::asset('img/default/company_picture.png')}}" alt="Company Image">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-1"></div>
            <div class="col-6 mt-5 p-5">
                <div class="row">
                    <h4>About This Event</h4>
                </div>
                <div class="row text-muted">
                    <h5>{{ $event->date_time->diffInHours($event->end_time, false) . " Hours"}}</h5>
                </div>
                <div class="row text-muted">
                    <h5>{{ $event->event_description }}</h5>
                </div>
                <div class="row mt-5">
                    <h4>Date and time</h4>
                </div>
                <div class="row text-muted">
                    <h5>{{ $event->date_time->format('l') }}, {{ $event->date_time->format('F d') }},
                        {{ $event->date_time->format('Y') }}</h5>
                </div>
                <div class="row text-muted">
                    <h5>{{ $event->date_time->format('g:i a') }} - {{ $event->end_time->format('g:i a') }}</h5>
                </div>
                <div class="row mt-5">
                    <h4>Location</h4>
                </div>
                <div class="row text-muted">
                    <h5>{{ $event->venue }}</h5>
                </div>
                <div class="row text-muted">
                    <h5>{{ $event->street }}, {{ $event->city }}, {{ $event->province }}</h5>
                </div>
            </div>
            <div class="col-4 mt-5 p-5">
                <div class="container-fluid card">
                    <div class="m-2">
                    <div class="row align-items-center mt-1">
                        <div class="col-6">
                            <h5>Admission</h5>
                        </div>
                        <div class="col-2 ps-2 pe-2" >
                            <a id="decreaseTicketNum" type="button" class="btn btn-primary form-control p-1">-</a>
                        </div>
                        <div class="col-2 text-center mb-0">
                            <h4 style="margin-bottom: 0px" >1</h4>
                        </div>
                        <div class="col-2 ps-2 pe-2">
                            <a id="increaseTicketNum" type="button" class="btn btn-primary form-control p-1">+</a>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <h5>Price</h5>
                        </div>
                        <div class="col-6 text-end">
                            <h5>${{$event->ticket_price}}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="{{ route('checkout_contact_info', [$client, $event]) }}" type="button" class="btn btn-primary btn-lg form-control">Reserve a Spot</a>
                        </div>
                    </div>
                    </div>
                </div>

            </div>
            <div class="col-1"></div>

        </div>
    </div>

@endsection
@push('other-scripts')
    <script>
        console.log("do something in js")
    </script>

@endpush
