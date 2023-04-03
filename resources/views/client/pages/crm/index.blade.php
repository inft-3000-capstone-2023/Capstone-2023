@extends('client.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Customer Relationship Management') }}</div>

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

                        <form action="{{ route('client.customers', [$client]) }}" method="GET">
                            @csrf
                            <div class="input-group mb-3">
                                <label for="searchTerm"></label>
                                <input type="text" class="form-control" id="searchTerm" name="searchTerm"
                                       value="{{ $searchTerm ? : old('searchTerm') }}" placeholder="Search Customers">
                                <button type="submit" class="btn btn-outline-primary">Search</button>
                            </div>
                        </form>

{{--                        <div class="mb-3">--}}
{{--                            <a href="{{ route('client.customers.create', $client) }}" class="btn btn-outline-primary">Create New Customer</a>--}}
{{--                        </div>--}}

                        <table class="table table-dark table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Customer Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col" colspan="2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customers as $customer)
                                <tr>
                                    <td>{{ $customer->id }}</td>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->email }}</td>

                                    <td>
                                        <form method="POST"
                                              action="{{ route('client.destroy_customer', [$client, $customer->id]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                    <td><a href="{{ route('client.customer_details', [$client, $customer->id]) }}"
                                           class="btn btn-secondary">Details</a></td>
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
