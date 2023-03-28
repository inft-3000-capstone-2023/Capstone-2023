@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="container col-10 pt-sm-2">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <h2 class="pt-sm-2 pb-sm-2">Hello, {{ $client->company_name }}! <span class="badge bg-secondary"></span></h2>

                            <div class="row pt-sm-2 pb-sm-2">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <div class="card pt-sm-2 pb-sm-2 border-primary">
                                        <div class="card-body">
                                            <h5 class="card-title">Create your event</h5>
                                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                            <a href="{{route('client.createS1',$client)}}" class="btn btn-primary">Create!</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card pt-sm-2 pb-sm-2 border-primary">
                                        <div class="card-body">
                                            <h5 class="card-title">Update your organizer profile</h5>
                                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                            <a href="{{route('client.client_organizer',$client)}}" class="btn btn-primary">Start!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card text-center pt-sm-2 pb-sm-4 border-info">
                                <div class="card-header">
                                    Events
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">View your recent events</h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                    <a href="{{route('client.client_events',$client)}}" class="btn btn-primary">Go!</a>
                                </div>
                                <div class="card-footer text-body-secondary">

                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
