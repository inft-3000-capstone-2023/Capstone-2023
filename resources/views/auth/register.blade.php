@extends('main_landing.layouts.app')

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
            <link href="{{ URL::asset('css/client_register.css') }}" rel="stylesheet" />
            <div class="register-container">
                <div class="register-section">
                    <img
                        src="{{ URL::asset('img/logo.png') }}"
                        alt="image"
                        id="logo_image"
                        class="register-image image_logo"
                    />
                    <h1 id="heading_register" class="register-text">Create an account</h1>
                    <form id="form_register" class="register-form" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div>
                            <input type="text" placeholder="Name" id="input_name" class="input input_name @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus/>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div>
                            <input type="text" placeholder="Email" id="input_email" class="input input_email @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"/>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div>
                            <input type="password" placeholder="Password" id="input_password" class="input input_password @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"/>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
{{--                        style margins are temporary, until bootstrap styles are implemented--}}
                        <div style="margin-left: 400px; margin-top: 65px">
                            <input type="password" placeholder="Confirm Password" id="password-confirm" class="form-control" name="password_confirmation" required autocomplete="new-password"/>
                        </div>
                        <button type="submit" id="button_signup" class="button button_signup">
                            Sign Up
                        </button>
                        <button type="submit" id="button_google" class="button button_google">
                            Sign Up with Google
                        </button>
                        <button type="submit" id="button_login" class="button button_login2">
          <span>
            <span>Log In</span>
            <br />
          </span>
                        </button>
                    </form>
                </div>
                <div class="register-img">
                    <img
                        src="https://images.unsplash.com/photo-1540317580384-e5d43616b9aa?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80"
                        alt="image"
                        id="side_image2"
                        class="image_side"
                    />
                </div>
            </div>
        </div>


    </div>
     </div>
</div>
@endsection
