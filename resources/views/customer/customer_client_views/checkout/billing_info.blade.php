@extends('customer.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-1">
            </div>
            <div class="col-6">

                <div class="row text-center">
                    <div class="col-12">
                        <h2>Check Out</h2>
                    </div>
                </div>

                <div class="row  mt-3">
                    <div class="col-12">
                        <h3>Billing Information</h3>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-6">
                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First name" required>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" id="lastName" name="lastname" placeholder="Last name" required>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-6">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email Address" required>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" id="emailConfirm" name="emailConfirm" placeholder="Confirm Email" required>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12">
                        <input name="sendEmails" id="sendEmails" type="checkbox">
                        <label for="sendEmails">Send me emails about the best events happening nearby or online</label>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-12">
                        <h3>Pay With</h3>
                    </div>
                </div>


                <div class="row mt-3 border">
                    <div class="col-1 p-3">
                        <input name="paymentMethod" type="radio">
                    </div>

                    <div class="col-11 p-3">
                        <label for="creditCard">Credit Card</label>
                    </div>
                </div>


                <div class="row mt-3 border">
                    <div class="col-1 p-3">
                        <input name="paymentMethod" type="radio">
                    </div>

                    <div class="col-11 p-3">
                        <label for="payPal">PayPal</label>
                    </div>
                </div>

                <div class="row  mt-3">

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
                <a href="{{ route('checkout_order_success', [$client, $event]) }}" class="btn btn-primary"><h3 class="m-0">Place Order</h3></a>
            </div>
        </div>
    </div>

@endsection
