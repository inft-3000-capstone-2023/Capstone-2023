@extends('customer.layouts.app')

@section('content')
    <div class="container-fluid home-hero text-center px-lg-5 py-lg-5" style="background-image: url({{URL::asset('img/default/banner_background.jpg')}})">
        <link rel="stylesheet" href="{{ URL::asset('css/customer_home.css') }}"/>
        <link rel="stylesheet" href="{{ URL::asset('css/customer_reviews.css') }}"/>
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
            <div class="col align-items-end">
                <img class="home-hero-img" src="{{URL::asset('img/default/company_picture.png')}}" alt="Company Image">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            @if (session('status-review-added'))
                <div class="alert alert-success mt-2 text-center" role="alert">
                    {{ session('status-review-added') }}
                </div>
            @endif
            @if (session('status-review-updated'))
                <div class="alert alert-info mt-2 text-center" role="alert">
                    {{ session('status-review-updated') }}
                </div>
            @endif
            <h1 class="mt-5">Reviews</h1>
            <h4 class="text-muted"><div style="color: #ffc700;">{{str_repeat("★", $total_rating)}}</div> ( {{ $total_rating }} / 5 )</h4>
            @if ($canReview)
                <div class="row mt-2 mb-2">
                    <div class="card mt-4 col-sm-6">
                        <form method="POST" action="{{ route('reviews_page.store', $client->id) }}">
                            @csrf
                            <div class="card-header bg-transparent">
                                <h4 class="mb-0">Write a review</h4>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <div class="rate" id="ratingDiv">
                                        <input type="radio" id="star5" name="rate" value="5" required/>
                                        <label for="star5" title="text">5 stars</label>
                                        <input type="radio" id="star4" name="rate" value="4" />
                                        <label for="star4" title="text">4 stars</label>
                                        <input type="radio" id="star3" name="rate" value="3" />
                                        <label for="star3" title="text">3 stars</label>
                                        <input type="radio" id="star2" name="rate" value="2" />
                                        <label for="star2" title="text">2 stars</label>
                                        <input type="radio" id="star1" name="rate" value="1" />
                                        <label for="star1" title="text">1 star</label>
                                    </div>
                                </h5>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Title</span>
                                    <input type="text" class="form-control" placeholder="Review title" aria-label="Username" aria-describedby="basic-addon1" name="reviewTitle" id="reviewTitle">
                                    @error('reviewTitle')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <p class="card-text">
                                <div class="input-group">
                                    <span class="input-group-text">Review</span>
                                    <textarea class="form-control" aria-label="With textarea" placeholder="Write your review here" name="reviewContent" id="reviewContent"></textarea>
                                    @error('reviewContent')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                </p>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
            @if ($hasReview)
                <div class="row mt-2 mb-2">
                    <div class="card mt-4 col-sm-6">
                        <form method="POST" action="{{ route('reviews_page.update', [$client->id, $userReview->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-header bg-transparent">
                                <h4 class="mb-0">Your review</h4>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">
                                    <div class="rate" id="ratingDiv">
                                        <input type="radio" id="star5" name="rate" value="5" required {{ $userReview->rating == 5 ? 'checked': ''}}/>
                                        <label for="star5" title="text">5 stars</label>
                                        <input type="radio" id="star4" name="rate" value="4" {{ $userReview->rating == 4 ? 'checked': ''}}/>
                                        <label for="star4" title="text">4 stars</label>
                                        <input type="radio" id="star3" name="rate" value="3" {{ $userReview->rating == 3 ? 'checked': ''}}/>
                                        <label for="star3" title="text">3 stars</label>
                                        <input type="radio" id="star2" name="rate" value="2" {{ $userReview->rating == 2 ? 'checked': ''}}/>
                                        <label for="star2" title="text">2 stars</label>
                                        <input type="radio" id="star1" name="rate" value="1" {{ $userReview->rating == 1 ? 'checked': ''}}/>
                                        <label for="star1" title="text">1 star</label>
                                    </div>
                                </h5>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">Title</span>
                                    <input type="text" class="form-control" placeholder="Review title" aria-label="Username" aria-describedby="basic-addon1" name="reviewTitle" id="reviewTitle" value="{{ $userReview->title }}">
                                    @error('reviewTitle')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <p class="card-text">
                                <div class="input-group">
                                    <span class="input-group-text">Review</span>
                                    <textarea class="form-control" aria-label="With textarea" placeholder="Write your review here" name="reviewContent" id="reviewContent">{{ $userReview->description }}</textarea>
                                    @error('reviewContent')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                </p>
                                <div class="container">
                                    <div class="row">
                                        <div class="col text-center">
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </div>
                        </form>
                        <div class="col text-center">
                            <form method="POST" action="{{route('reviews_page.destroy', [$client->id, $userReview->id])}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
                    </div>
                </div>
            @endif
            <div class="col-lg mt-5">
                <table class="table table-striped">
                    <tbody>
                        @foreach($reviews as $review)
                            <tr>
                                <td>
                                    <div class="container">
                                        <div class="row" style="font-weight: bold; font-size: large">
                                            {{ $review->title }}
                                        </div>
                                        <div class="row" style="font-size: large; color: #ffc700">
                                            {{ str_repeat("★", $review->rating) }}
                                        </div>
                                        <div class="row text-muted">
                                            by {{$review->customer()->first()->name()}} on {{ $review->created_at->format('F d') }},  {{ $review->created_at->format('Y') }}
                                            @if($review->updated_at != null)
                                                 (Updated on {{ $review->created_at->format('F d') }},  {{ $review->created_at->format('Y') }})
                                            @endif
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
