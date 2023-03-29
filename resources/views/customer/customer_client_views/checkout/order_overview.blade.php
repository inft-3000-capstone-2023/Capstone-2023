@extends('customer.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-1"></div>
            <div class="col-6">

                <div class="row text-center">
                    <div class="col-12">
                        <h2>[Event Name] - [City]</h2>
                    </div>
                </div>

                <div class="row text-center text-muted">
                    <div class="col-12">
                        <h5>[Start Time] - [End Time] </h5>
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
                                    <h5>[Ticket Type?]</h5>
                                </div>
                                <div class="col-2 text-end">
                                    <button class="btn btn-primary"><h5 class="m-0">-</h5></button>
                                </div>
                                <div class="col-1 text-center p-0">
                                    <h4 class="m-0">XX</h4>
                                </div>
                                <div class="col-2">
                                    <button class="btn btn-primary"><h5 class="m-0">+</h5></button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="m-0">[Ticket Price]</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-muted">
                                    <p class="m-0">incl. [Fees]</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <p>Sales end on [Event day?]</p>
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
                                <p class="m-1">X</p>
                            </div>

                            <div class="col-6 p-0">
                                <p class="m-1"> x [event name] Admission</p>
                            </div>

                            <div class="col-5 text-end">
                                <p class="m-1">$XX.XX</p>
                            </div>
                        </div>

                        <hr class="m-1">

                        <div class="row mt-1">
                            <div class="col-6">
                                <p class="m-1">Subtotal</p>
                            </div>

                            <div class="col-6 text-end">
                                <p class="m-1">$XX.XX</p>
                            </div>
                        </div>

                        <div class="row mt-1">
                            <div class="col-6">
                                <p class="m-1">Fees</p>
                            </div>

                            <div class="col-6 text-end">
                                <p class="m-1">$XX.XX</p>
                            </div>
                        </div>

                        <hr class="m-1">

                        <div class="row mt-1">
                            <div class="col-6">
                                <h5 class="m-1">Total</h5>
                            </div>

                            <div class="col-6 text-end">
                                <h5 class="m-1">$XX.XX</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
        <div class="row mt-5">
            <div class="col-12 text-center">
                <a href="{{ route('checkout_billing_info', $client) }}" class="btn btn-primary"><h3 class="m-0">Check Out</h3></a>
            </div>
        </div>
    </div>

@endsection
