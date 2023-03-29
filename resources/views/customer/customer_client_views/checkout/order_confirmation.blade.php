@extends('customer.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-1">
            </div>
            <div class="col-6">

                <div class="row text-center">
                    <div class="col-12">
                        <h2>Thank you for your order!</h2>
                    </div>
                </div>

                <div class="row  mt-3">
                    <div class="col-12">
                        <h3>You're going to</h3>
                    </div>
                </div>

                <div class="row  mt-3">
                    <div class="col-12">
                        <h2>[Event Name] on [Event Date] </h2>
                    </div>
                </div>

                <div class="row  mt-5">
                    <div class="col-6">
                        <h4 class="m-0">Location</h4>
                    </div>

                    <div class="col-6">
                        <h4 class="m-0">Date</h4>
                    </div>
                </div>

                <div class="row  mt-3">
                    <div class="col-6">
                        <h5 class="m-0">[Event City], [Event Prov]</h5>
                    </div>

                    <div class="col-6">
                        <h5 class="m-0">[Event Date] - [Event Start Time]</h5>
                    </div>
                </div>

                <div class="row  mt-5">
                    <div class="col-12">
                        <h4 class="m-0">X Ticket(s) sent to </h4>
                    </div>
                </div>

                <div class="row  mt-3">
                    <div class="col-12">
                        <h5 class="m-0">Email 1 </h5>
                    </div>
                </div>
                <div class="row  mt-1">
                    <div class="col-12">
                        <h5 class="m-0">Email 2 </h5>
                    </div>
                </div>
                <div class="row  mt-1">
                    <div class="col-12">
                        <h5 class="m-0">...</h5>
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
                <a href="{{ route('client_page', $client) }}" class="btn btn-primary"><h3 style="margin-bottom: 0px">Back to Home</h3></a>
            </div>
        </div>
    </div>

@endsection
