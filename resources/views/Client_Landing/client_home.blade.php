@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>
                <link rel="stylesheet" href="<?php echo asset('css/client_home.css')?>" type="text/css">
                <div class="home-container">
                    <div class="home-hero">
                        <div class="home-container1">
                            <h1 class="home-text">Create your event today..</h1>
                            <span class="home-text1">
          <span>
            <span>
              Welcome to NETS, your one-stop solution for creating your own event listing store. Our platform provides a wide range of services for clients who want to promote and sell tickets for their events online.
            </span>
            <span></span>
          </span>

        </span>
                            <div class="home-btn-group">
                                <button class="home-button button">Create your event</button>
                            </div>
                        </div>
                        <img
                            alt="image"
                            src="https://images.unsplash.com/photo-1517263904808-5dc91e3e7044?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=688&q=80"
                            class="home-image"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
