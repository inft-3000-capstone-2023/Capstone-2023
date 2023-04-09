@extends('customer.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-1"></div>
            <div class="col-6">

                <div class="row text-center">
                    <div class="col-12">
                        <h2>{{ $event->event_title }} - {{ $event->city }}</h2>
                    </div>
                </div>

                <div class="row text-center text-muted">
                    <div class="col-12">
                        <h5>
                            {{ $event->date_time->format('F j') }} from
                            {{ $event->date_time->format('g:i a') }} - {{ $event->end_time->format('g:i a') }}
                        </h5>
                    </div>
                </div>

                <div class="row  mt-3">
                    <div class="col-12">
                        <h3>Promo Code</h3>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-12">
                        <input type="text" class="form-control" id="promoCode" name="promoCode" placeholder="Enter Code">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <div class="row align-items-center">
                                <div class="col-7">
                                    <h5 class="m-0">General Admission</h5>
                                </div>

                                <div class="col-5 text-end p-0">
                                    <h4 id="overview_num" class="m-0">1 Ticket</h4>
                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="m-0">{{$event->ticket_price}}  ea.</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <p>Sales end on {{$event->date_time->subHour(2)->format('F j g:i a')}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-muted">
                                    <p>Tickets are non-refundable</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-1"></div>

            <div class="col-3">
                <div class="row mt-5">
                    <div class="col-12 text-center">
                        <img class="img-fluid" src="{{URL::asset('img/default/company_picture.png')}}" alt="Company Image">
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="card">

                        <div class="row mt-1">
                            <div class="col-12">
                                <h5 class="m-1">Order Summary</h5>
                            </div>
                        </div>

                        <hr class="mt-1">

                        <div class="row">
                            <div class="col-1 text-end">
                                <p class="m-1">1</p>
                            </div>

                            <div class="col-7 p-0">
                                <p class="m-1">{{ $event->event_title }} Admission</p>
                            </div>

                            <div class="col-4 text-end">
                                <p class="m-1">${{$event->ticket_price}}</p>
                            </div>
                        </div>

                        <hr class="m-1">

                        <div class="row mt-1">
                            <div class="col-6">
                                <p class="m-1">Subtotal</p>
                            </div>

                            <div class="col-6 text-end">
                                <p class="m-1">${{$event->ticket_price}}</p>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-6">
                                <p class="m-1">Fees</p>
                            </div>

                            <div class="col-6 text-end">
                                <p class="m-1">$2.00</p>
                            </div>
                        </div>

                        <hr class="m-1">

                        <div class="row mt-1">
                            <div class="col-6">
                                <h5 class="m-1">Total</h5>
                            </div>

                            <div class="col-6 text-end">
                                <h5 class="m-1">${{$event->ticket_price + 2}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
        <div class="row mt-5">
            <div class="col-12 text-center">
                <a href="{{ route('checkout_billing_info', [$client, $event]) }}" class="btn btn-primary"><h3 class="m-0">Check Out</h3></a>
            </div>
        </div>
    </div>


@endsection
