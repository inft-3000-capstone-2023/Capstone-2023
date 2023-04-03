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
                                <a class="nav-link" href="{{ route('client.customer_transactions', [$client, $customer]) }}">Transaction History</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('client.customer_finances', [$client, $customer]) }}">Financial Summary</a>
                            </li>
                        </ul>


                        <form style="padding: 10px 0 0 0;" method="POST" action="{{ route('client.customer_transactions', [$client, $customer]) }}">
                            @csrf
                            @method('PUT')
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="num_purchases">Total Number of Purchases</label>
                                            <input readonly type="text" class="form-control" id="num_purchases" name="num_purchases"
                                                   value="{{ $num_purchases }}">
                                            @error('num_purchases')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="amount_spent">Total Amount Spent</label>
                                            <input readonly type="text" class="form-control" id="amount_spent" name="amount_spent"
                                                   value="{{ $amount_spent }}">
                                            @error('amount_spent')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="avg_amount_spent">Average Amount Per Purchase</label>
                                            <input readonly type="text" class="form-control" id="avg_amount_spent" name="avg_amount_spent"
                                                   value="{{ $avg_amount_spent }}">
                                            @error('avg_amount_spent')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
{{--                            <button type="submit" class="btn btn-primary">Save</button>--}}
                            <a href="{{ route('client.customers', [$client]) }}" class="btn btn-outline-danger">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
