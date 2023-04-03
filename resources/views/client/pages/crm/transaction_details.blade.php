@extends('client.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Transaction Details') }}</div>

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

                        <ul class="nav nav-tabs" id="customer_summary_tabs">
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

                        <form id="edit_transaction" style="padding: 30px 10px;" method="POST" action="{{ route('client.customer_transactions', [$client, $customer]) }}">
                            @csrf
                            @method('PUT')
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="transaction_id">Transaction Id</label>
                                            <input readonly type="text" class="form-control" id="transaction_id" name="transaction_id" value="{{ old('transaction_id') ?? $transaction->id }}">
                                            @error('transaction_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                     <div class="col-sm-6">
                                         <div class="mb-3">
                                            <label for="associated_event_id">Associated Event id</label>
                                            <input readonly type="text" class="form-control" id="associated_event_id" name="associated_event_id" value="{{ old('associated_event_id') ?? $associated_event->id }}">
                                            @error('associated_event_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                         </div>
                                         <div class="mb-3">
                                            <label for="associated_event">Associated Event Title</label>
                                            <input readonly type="text" class="form-control" id="associated_event" name="associated_event" value="{{ old('associated_event') ?? $associated_event->event_title }}">
                                            @error('associated_event')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                         <div class="mb-3">
                                            <label for="date_processed">Date Processed</label>
                                            <input readonly type="text" class="form-control" id="date_processed" name="date_processed" value="{{ old('date_processed') ?? $transaction->created_at }}">
                                            @error('date_processed')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                         <div class="mb-3">
                                            <label for="total_amount">Total Amount</label>
                                            <input readonly type="text" class="form-control" id="total_amount" name="total_amount" value="{{ old('total_amount') ?? $transaction->total }}">
                                            @error('total_amount')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                         <div class="mb-3 form-check">
                                             <label class="form-check-label" for="receipted_check">Receipted?</label>
                                             <input class="form-check-input" type="checkbox" value="" id="receipted_check">
                                         </div>
                                    </div>
                                </div>
                            </div>
{{--                            <button type="submit" class="btn btn-primary">Save</button>--}}
                            <a href="{{ route('client.customer_transactions', [$client, $customer]) }}" class="btn btn-primary">Save</a>
                            <a href="{{ route('client.customer_transactions', [$client, $customer]) }}" class="btn btn-outline-danger">Back</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
