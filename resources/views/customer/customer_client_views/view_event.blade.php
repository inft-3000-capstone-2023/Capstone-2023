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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4 mt-5">
                <div class="row p-3">
                    <img class="home-hero-img" src="{{URL::asset('img/default/company_picture.png')}}" alt="Company Image">
                </div>
            </div>
            <div class="col-4 mt-5">
                <div class="row">
                    <h4>About This Event</h4>
                </div>
                <div class="row">
                    <h5>[X Hours]</h5>
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
                    <h5>[start time] - [end time]</h5>
                </div>
                <div class="row mt-5">
                    <h4>Location</h4>
                </div>
                <div class="row text-muted">
                    <h5>[Venue]</h5>
                </div>
                <div class="row text-muted">
                    <h5>{{ $event->street }}, {{ $event->city }}, {{ $event->province }}</h5>
                </div>
            </div>
            <div class="col-4 mt-5">
                <div class="container-fluid card">
                    <div class="row align-items-center mt-1">
                        <div class="col-6">
                            <h5>Admission</h5>
                        </div>
                        <div class="col-2 p-0">
                            <a type="button" class="btn btn-primary form-control">-</a>
                        </div>
                        <div class="col-2">
                            <h5>X</h5>
                        </div>
                        <div class="col-2 p-0 pe-1">
                            <a type="button" class="btn btn-primary form-control">+</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <h5>Free</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a type="button" class="btn btn-primary btn-lg form-control">Reserve a Spot</a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg mt-5">
                <table class="table table-striped">
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
