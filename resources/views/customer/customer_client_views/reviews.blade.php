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
                        <a type="button" class="btn btn-primary btn-lg form-control">Reviews</a>
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
            <h4 class="text-muted"><div style="color: #ffc700;">{{str_repeat("★", $total_rating)}}</div> ( {{ $total_rating }} / 5 )</h4>
            <div class="col-lg mt-5">
                <table class="table table-striped">
                    <tbody>
                        @foreach($reviews as $review)
                            <tr>
                                <td>
                                    <div class="container text-center">
                                        <div class="row" style="font-weight: bold; font-size: large">
                                            {{ $review->title }}
                                        </div>
                                        <div class="row" style="font-size: large; color: #ffc700">
                                            {{ str_repeat("★", $review->rating) }}
                                        </div>
                                        <div class="row text-muted">
                                            by {{$review->customer()->first()->name()}} on {{ $review->created_at->format('F d') }},  {{ $review->created_at->format('Y') }}
                                        </div>
                                        <div class="row mt-2">

                                            {{ $review->description }}

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {!! $reviews->links('vendor.pagination.bootstrap-5') !!}
            </div>
        </div>
    </div>
@endsection
