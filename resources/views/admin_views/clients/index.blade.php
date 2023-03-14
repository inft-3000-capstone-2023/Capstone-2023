@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Client List') }}</div>

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

                        <a href="{{ route('clients.create') }}" class="btn btn-outline-primary">Create New Client</a>

                        <table class="table">
                        <thead>
                        <tr>
                            <th>Client id</th>
                            <th>Client Name</th>
                            <th>Created At</th>
                            <th colspan="3">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clients as $client)
                            <tr>
                                <td>{{ $client->id }}</td>
                                <td>{{ $client->company_name }}</td>
                                <td>{{ $client->created_at }}</td>

                                <td> <a href="{{ route('clients.edit', [$client->id]) }}" class="btn btn-warning">Edit</a></td>
                                <td>
                                    <form method="POST" action="{{ route('clients.destroy', $client->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                <td><a href="{{ route('clients.show', [$client->id]) }}" class="btn btn-outline-secondary">Details</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
