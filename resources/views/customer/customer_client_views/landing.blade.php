@extends('customer.layouts.app')

@section('content')
    <div class="container-fluid home-hero text-center">
        <link rel="stylesheet" href="{{ URL::asset('css/customer_home.css') }}"/>
        <div class="row align-items-end">
            <div class="container col-8 text-center">
                <div class="row mb-4">
                    <h1>{{$client->company_name}}</h1>
                </div>
                <div class="row align-items-end">
                    <div class="col">
                        <button type="button" class="btn btn-primary">Events</button>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-primary">Review</button>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-primary">Bio</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <img class="home-hero-img" src="{{URL::asset('img/company_picture.png')}}" alt="Company Image">
            </div>
        </div>
    </div>
    <div class="container">

        <div class="row justify-content-center">

            <h1 class="mt-4">All Events</h1>
            <div class="col-lg mt-3">
                <table class="table table-striped">
                    <tbody>
                    @foreach($events as $event)
                        <tr>
                            <td>
                                <div class="container text-center">
                                    <div class="row">
                                        March 23
                                    </div>
                                    <div class="row">
                                        Wed 7:00pm
                                    </div>
{{--                                    {{//date('m-d', strtotime($event->date_time))}}--}}
                                </div>
                            </td>
                            <td>

                                <div class="container text-center">
                                    <div class="row">
                                        {{$event->city}}, {{$event->province}}
                                    </div>
                                    <div class="row">
                                        {{$event->event_title}}
                                    </div>
                                    {{--                                    {{//date('m-d', strtotime($event->date_time))}}--}}
                                </div>
                            </td>
                            <td>
                                <div class="container text-center mt-1 mb-auto">
                                    <button class="btn btn-primary mt-auto mb-auto">See Tickets</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
