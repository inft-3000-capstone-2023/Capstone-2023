@extends('customer.layouts.app')

@section('content')
    <div class="container-fluid home-hero text-center px-lg-5 py-lg-5" style="background-image: url({{URL::asset('img/default/banner_background.jpg')}})">
        <link rel="stylesheet" href="{{ URL::asset('css/customer_home.css') }}"/>
        <div class="row align-items-end">
            <div class="container col-7">
                <div class="row mb-4">
                    <h1>{{$client->company_name}}</h1>
                </div>
                <div class="row">
                    <div class="col">
                        <a href="{{ route('client_page', $client) }}" type="button" class="btn btn-secondary btn-lg form-control">Events</a>
                    </div>
                    <div class="col">
                        <a type="button" class="btn btn-primary btn-lg form-control">Review</a>
                    </div>
                    <div class="col">
                        <a href="{{ route('bio_page', $client) }}" type="button" class="btn btn-secondary btn-lg form-control">Bio</a>
                    </div>
                </div>
            </div>
            <div class="col-5 align-items-end">
                <img class="home-hero-img" src="{{URL::asset('img/default/company_picture.png')}}" alt="Company Image">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="mt-5">Reviews</h1>
            <h4 class="text-muted">{{ sizeof($reviews) }}  • {{ array_sum($reviews->rating) / sizeof($reviews) }}</h4>
            <div class="col-lg mt-5">
                <table class="table table-striped">
                    <tbody>
                        @foreach($reviews as $review)
                            <tr>
                                <td>
                                    <div class="container text-center">
                                        <div class="row" style="font-weight: bold">
                                            {{ $review->title }}
                                        </div>
                                        <div class="row text-muted">
                                            {{--TODO: Get customer name--}}
                                            by [Name] on {{ $review->created_at->format('F d') }},  {{ $review->created_at->format('Y') }}
                                        </div>
                                        <div class="row mt-2">

                                            {{ $review->description }}

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
{{--                    @foreach($events as $event)--}}
{{--                        <tr>--}}
{{--                            <td>--}}
{{--                                <div class="container text-center">--}}
{{--                                    <div class="row" style="font-weight: bold">--}}
{{--                                        {{$event->date_time->format('F d')}}, {{$event->date_time->format('Y')}}--}}
{{--                                    </div>--}}
{{--                                    <div class="row text-muted">--}}
{{--                                        {{$event->date_time->format('l')}} • {{$event->date_time->format('h:i a')}}--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                <div class="container text-center">--}}
{{--                                    <div class="row" style="font-weight: bold">--}}
{{--                                        {{$event->city}}, {{$event->province}}--}}
{{--                                    </div>--}}
{{--                                    <div class="row text-muted">--}}
{{--                                        {{$event->event_title}}--}}
{{--                                    </div>--}}
{{--                                    --}}{{--                                    {{//date('m-d', strtotime($event->date_time))}}--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                <div class="container text-center mt-1 mb-auto">--}}
{{--                                    <button class="btn btn-primary mt-auto mb-auto">See Tickets</button>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
