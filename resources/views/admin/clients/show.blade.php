@extends('admin.layouts.app')

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
                        <div class="mb-3">
                            <h4>Logo URL</h4>
                            <p>{{ $client->logo_path }}</p>
                            <img style="width:50px; height:50px; border: solid thin red;" src="{{ url('public/images/'.$client->id.'/logo.png') }}"  alt=""/> <!-- TODO - Jay - Is this way of doing logo path fine? -->
                        </div>

                        <h3>Client Events</h3>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Event id</th>
                                <th>Event Title</th>
                                <th>Date</th>
                                <th colspan="2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($events as $event)
                                <tr>
                                    <td>{{ $event->id }}</td>
                                    <td>{{ $event->event_title }}</td>
                                    <td>{{ $event->date_time }}</td>

                                    <td>
                                        <form method="POST" action="{{ route('events.destroy', $event->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                    <td><a href="{{ route('events.show', [$event->id]) }}" class="btn btn-outline-secondary">Details</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <h3>Client Users</h3>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>User id</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>Date Created</th>
                                <th colspan="2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($client_users as $client_user)
                                <tr>
                                    <td>{{ $client_user->id }}</td>
                                    <td>&nbsp;</td> <!-- TODO $client_user->name -->
                                    <td>&nbsp;</td><!-- TODO $client_user->email -->
                                    <td>{{ $client_user->created_at }}</td>

{{--                                    <td>--}}
{{--                                        <form method="POST" action="{{ route('clientuser.destroy', $client_user->id) }}">--}}
{{--                                            @csrf--}}
{{--                                            @method('DELETE')--}}
{{--                                            <button type="submit" class="btn btn-danger">Delete</button>--}}
{{--                                        </form>--}}
{{--                                    </td>--}}
{{--                                    <td><a href="{{ route('clientuser.show', [$client_user->id]) }}" class="btn btn-outline-secondary">Details</a></td>--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <a href="{{ route('list_clients') }}" class="btn btn-outline-danger">Back</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
