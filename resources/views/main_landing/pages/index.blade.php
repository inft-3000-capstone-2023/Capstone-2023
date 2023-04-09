@extends('main_landing.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-start">
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <div class="col-md-8">
                <!--This is the font section-->
                <link
                    rel="stylesheet"
                    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&amp;display=swap"
                    data-tag="font"
                />
                <!--This is the global style section-->
                <link rel="stylesheet" href="css/style.css" />

                <div>
                    <!--This is the client homepage style section-->
                    <link href="css/client_home.css" rel="stylesheet" />

                    <div class="home-container">
                        <div class="home-hero">
                            <span class="home-text">WELCOME TO NETS</span>
                            <h1 class="home-text01">Create your event today..</h1>
                            @auth
                                <button onclick="location.href='{{ route('client.dashboard', ['client' => Auth::user()->client_id()]) }}'" class="home-button button">Get Started</button>
                            @else
                                <button onclick="location.href='{{ route('login') }}'" class="home-button button">Get Started</button>
                            @endauth

                        </div>
                        <div class="home-banner">
                            <h1 class="home-text02">Why NETS?</h1>
                            <span class="home-text03">
            <span>
              With our user-friendly interface and customizable templates, you
              can easily create an event listing store that matches your brand
              and style. You can showcase all the important details about your
              events, such as date, time, location, and ticket pricing.
            </span>
            <br />
            <br />
            <span>
              Our platform also provides advanced features such as ticketing and
              registration, which allows you to manage your attendees and track
              your event's success. You can even set up discounts and promotions
              to incentivize ticket sales and generate more revenue.
            </span>
            <br />
            <br />
            <span>
              But that's not all. We also offer marketing and promotion services
              to help you reach a wider audience and increase your event's
              visibility. Our team of experts can help you with social media
              marketing, email marketing, and other digital marketing strategies
              to make sure your events get the attention they deserve.
            </span>
            <br />
            <br />
            <span>
              With NETS, you can create an event listing store that stands out
              from the crowd and delivers a seamless experience for your
              attendees. So why wait? Sign up today and start creating your own
              event listing store!
            </span>
            <br />
          </span>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
