@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Show Client Event') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (session('error_status'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error_status') }}
                            </div>
                        @endif

                        <div class="mb-3">
                            <h4>Event Id</h4>
                            <p>{{ $event->id }}</p>
                        </div>
                        <div class="mb-3">
                            <h4>Event Title</h4>
                            <p>{{ $event->event_title }}</p>
                        </div>
                        <div class="mb-3">
                            <h4>Event Description</h4>
                            <p>{{ $event->event_description }}</p>
                        </div>
                        <div class="mb-3">
                            <h4>Date Created</h4>
                            <p>{{ $event->created_at }}</p>
                        </div>
                        <div class="mb-3">
                            <h4>Event Date</h4>
                            <p>{{ $event->time }}</p>
                        </div>

                        <a href="{{ route('clients.show', [$event->client_id]) }}" class="btn btn-outline-danger">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
