@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Show Client') }}</div>

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
                            <h4>Company Id</h4>
                            <p>{{ $client->id }}</p>
                        </div>
                        <div class="mb-3">
                            <h4>Company Name</h4>
                            <p>{{ $client->company_name }}</p>
                        </div>
                        <div class="mb-3">
                            <h4>Company Description</h4>
                            <p>{{ $client->description }}</p>
                        </div>

                        <table class="table">
                            <thead>
                            <tr>
                                <th>Event id</th>
                                <th>Event Title</th>
                                <th>Date of Event</th>
                                <th colspan="3">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($events as $event)
                                <tr>
                                    <td>{{ $event->id }}</td>
                                    <td>{{ $event->event_title }}</td>
                                    <td>{{ $event->time }}</td>

                                    <td>
                                        <form method="POST" action="{{ route('event.destroy', $event->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                    <td><a href="{{ route('event.show', [$event->id]) }}" class="btn btn-outline-secondary">Details</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <a href="{{ route('clients.index') }}" class="btn btn-outline-danger">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
