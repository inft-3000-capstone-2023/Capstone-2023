@extends('customer.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />
    <div class="col-md-8">
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&amp;display=swap"
            data-tag="font"
        />
        <div>
            <link href="{{ URL::asset('css/client_login.css') }}" rel="stylesheet" />
            <div class="login-container">
                <div class="login-section">
                    <img
                        src="/img/logo.png"
                        alt="image"
                        id="logo_image"
                        class="login-image image_logo"
                    />
                    <h1 id="heading_login" class="login-text">Log In</h1>
                    <form id="form_login" class="login-form" method="POST" action="{{ route('customer.login.request', $client->id) }}">
                        @csrf

                        <div class="form-floating mb-3" id="input_email">
                            <input type="email" aria-describedby="emailHelp" id="floatingInput"  class="form-control input input_email @error('email') is-invalid @enderror"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <label for="floatingInput">Email address</label>
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>

                        <div class="form-floating mb-3" id="input_password">
                            <input type="password" id="floatingPassword" class="form-control input input_password @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <label for="floatingPassword" >Password</label>
                        </div>

                        <button type="submit" id="button_login" class="btn btn-primary">
                            Log In
                        </button>

                        <button type="submit" id="button_google" class="btn btn-primary">
                            Sign In with Google
                        </button>

                        <a href="{{ route('register') }}">
                            <button id="button_signup" class=" button button_signup">
                              <span>
                                <span>Sign Up</span>
                                <br />
                              </span>
                            </button>
                        </a>
                    </form>
                </div>
                <div class="login-img">
                    <img
                        src="https://images.unsplash.com/photo-1569930784237-ea65a2f40a83?ixid=Mnw5MTMyMXwwfDF8c2VhcmNofDI3fHxldmVudHxlbnwwfHx8fDE2Nzc2MTAyNzY&amp;ixlib=rb-4.0.3&amp;h=1100"
                        alt="image"
                        id="side_image1"
                        class="image_side"
                    />
                </div>
            </div>
        </div>


    </div>
     </div>
</div>
@endsection
