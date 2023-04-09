@extends('customer.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-3">
            </div>
            <div class="col-6">

                <div class="row text-center">
                    <div class="col-12">
                        <h2>Thank you for your order!</h2>
                    </div>
                </div>

                <div class="row  mt-3 text-center">
                    <div class="col-12">
                        <h3>You're going to</h3>
                    </div>
                </div>

                <div class="row  mt-3 text-center">
                    <div class="col-12">
                        <h2>
                            {{ $event->event_title }} on {{ $event->date_time->format('l') }},
                            {{ $event->date_time->format('F j')}} at {{ $event->date_time->format('g:i a') }}
                        </h2>
                    </div>
                </div>

                <div class="row  mt-5 text-center">
                    <div class="col-6">
                        <h4 class="m-0">Location</h4>
                    </div>

                    <div class="col-6">
                        <h4 class="m-0">Date</h4>
                    </div>
                </div>

                <div class="row  mt-3 text-center">
                    <div class="col-6">
                        <h5 class="m-0">{{ $event->venue }}</h5>
                    </div>

                    <div class="col-6">
                        <h5 class="m-0">
                            {{ $event->date_time->format('l') }}, {{ $event->date_time->format('F j')}}
                        </h5>
                    </div>
                </div>

                <div class="row  mt-1 text-center">
                    <div class="col-6">
                        <h5 class="m-0">{{ $event->street }}, {{ $event->city }}</h5>
                    </div>

                    <div class="col-6">
                        <h5 class="m-0">{{ $event->date_time->format('g:i a') }} - {{ $event->end_time->format('g:i a') }}</h5>
                    </div>
                </div>



            </div>


            <div class="col-3"></div>
        </div>
        <div class="row mt-5">
            <div class="col-12 text-center">
                <a href="{{ route('client_page', $client) }}" class="btn btn-primary"><h3 style="margin-bottom: 0px">Back to Home</h3></a>
            </div>
        </div>
    </div>

@endsection
