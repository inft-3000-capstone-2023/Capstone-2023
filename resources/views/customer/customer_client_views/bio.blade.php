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
                        <a href="{{ route('reviews_page', $client) }}" type="button" class="btn btn-secondary btn-lg form-control">Review</a>
                    </div>
                    <div class="col">
                        <a type="button" class="btn btn-primary btn-lg form-control">Bio</a>
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
            <h1 class="mt-5">About {{ $client->company_name }}</h1>
            <hr>
            <div class="col-lg mt-4">
                <p>{{ $client->description }}</p>
            </div>
        </div>
    </div>
@endsection
