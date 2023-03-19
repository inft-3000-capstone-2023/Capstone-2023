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
                    <form class="register-form" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-floating mb-3" id="input_name">
                            <input type="text" id="floatingInput" class="form-control input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <label for="floatingInput">User name</label>
                        </div>

                        <div class="form-floating mb-3" id="input_email">
                            <input type="email" aria-describedby="emailHelp" id="floatingInput"  class="form-control input input_email @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <label for="floatingInput">Email address</label>
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>

                        <div class="form-floating" id="input_password">
                            <input type="password" id="floatingPassword" class="form-control input input_password @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <label for="floatingPassword">Password</label>
                        </div>


                        <div class="form-floating mb-3" id="input_password_confirm">
                            <input type="password"  class="form-control" name="password_confirmation" required autocomplete="new-password"/>
                            <label for="floatingPassword">Confirm password</label>
                        </div>

                        <button type="submit" id="button_signup" class=" btn btn-primary">
                            Sign Up
                        </button>

                        <button type="submit" id="button_google" class=" btn btn-primary">
                            Sign Up with Google
                        </button>

                        <a href="{{ route('login') }}">
                            <button id="button_login2" class=" button btn-primary">
                              <span>
                                <span>Log In</span>
                                <br />
                              </span>
                            </button>
                        </a>

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
