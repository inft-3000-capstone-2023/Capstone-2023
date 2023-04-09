@extends('client.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Customer Summary') }}</div>

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

                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('client.customer_details', [$client, $customer]) }}">Customer Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('client.customer_transactions', [$client, $customer]) }}">Transaction History</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('client.customer_finances', [$client, $customer]) }}">Financial Summary</a>
                            </li>
                        </ul>

                        <form style="margin:15px 0 0 0;" action="{{ route('client.customer_transactions', [$client, $customer]) }}" method="GET">
                            @csrf
                            <div class="input-group mb-3">
                                <label for="searchTerm"></label>
                                <input type="text" class="form-control" id="searchTerm" name="searchTerm"
                                       value="{{ $searchTerm ? : old('searchTerm') }}" placeholder="Search Transactions">
                                <button type="submit" class="btn btn-outline-primary">Search</button>
                            </div>
                        </form>

                        <table class="table table-dark table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Transaction Id</th>
                                <th scope="col">Event Name</th>
                                <th scope="col">Date</th>
                                <th scope="col"># of Tickets</th>
                                <th scope="col">Total</th>
                                <th scope="col" colspan="2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transactions as $transaction)
                                @php
                                    $associated_event = $transaction->event()->get()[0];
                                @endphp
                                <tr>
                                    <td>{{ $transaction->id }}</td>
                                    <td>{{ $associated_event->event_title }}</td>
                                    <td>{{ $transaction->created_at }}</td>
                                    <td>{{ $transaction->number_tickets }}</td>
                                    <td>{{ $transaction->total }}</td>

{{--                                    <td>--}}
{{--                                        <form method="POST"--}}
{{--                                              action="{{ route('transactions.destroy', [$associated_event->id]) }}">--}}
{{--                                            @csrf--}}
{{--                                            @method('DELETE')--}}
{{--                                            <button type="submit" class="btn btn-danger">Delete</button>--}}
{{--                                        </form>--}}
{{--                                    </td>--}}
                                    <td><a href="{{ route('client.transaction_details',[$client, $customer->id, $transaction->id]) }}"
                                           class="btn btn-secondary">Details</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <a href="{{ route('client.customers', [$client]) }}" class="btn btn-outline-danger">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
