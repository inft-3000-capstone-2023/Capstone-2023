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

                        <ul class="nav nav-tabs" id="customer_summary_tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('client.customer_details', [$client, $customer]) }}">Customer Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('client.customer_transactions', [$client, $customer]) }}">Transaction History</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('client.customer_finances', [$client, $customer]) }}">Financial Summary</a>
                            </li>
                        </ul>

                        <form id="edit_cust" style="padding: 30px 10px;" method="POST" action="{{ route('client.customers', $client) }}">
                            @csrf
                            @method('PUT')
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="customer_id">Customer Id</label>
                                            <input readonly type="text" class="form-control" id="customer_id" name="customer_id" value="{{ old('customer_id') ?? $customer->id }}">
                                            @error('customer_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                     <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="customer_name">Customer Name*</label>
                                            <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ old('customer_name') ?? $customer->name }}" placeholder="Enter Name">
                                            @error('customer_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="customer_email">Customer Email*</label>
                                            <input type="text" class="form-control" id="customer_email" name="customer_email" value="{{ old('customer_email') ?? $customer->email }}" placeholder="Enter Email">
                                            @error('customer_email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="customer_home_phone">Home Phone</label>
                                            <input readonly type="text" class="form-control" id="customer_home_phone" name="customer_home_phone" value="{{ old('customer_home_phone') ?? $customer->phone }}" placeholder="Enter Home Phone">
                                            @error('customer_home_phone')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="customer_cell_phone">Cell Phone</label>
                                            <input readonly type="text" class="form-control" id="customer_cell_phone" name="customer_cell_phone" value="{{ old('customer_cell_phone') ?? $customer->phone }}" placeholder="Enter Cell Phone">
                                            @error('customer_cell_phone')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label for="customer_street_address">Street Address</label>
                                            <input readonly type="text" class="form-control" id="customer_street_address" name="customer_street_address" value="{{ old('customer_street_address') ?? $customer->address }}" placeholder="Enter Street Address">
                                            @error('customer_street_address')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="customer_city">City</label>
                                            <input readonly type="text" class="form-control" id="customer_city" name="customer_city" value="{{ old('customer_city') ?? $customer->city }}" placeholder="Enter City">
                                            @error('customer_city')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="customer_province">Province</label>
                                            <input readonly type="text" class="form-control" id="customer_province" name="customer_province" value="{{ old('customer_province') ?? $customer->province }}" placeholder="Enter Province">
                                            @error('customer_province')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="customer_country">Country</label>
                                            <input readonly type="text" class="form-control" id="customer_country" name="customer_country" value="{{ old('customer_country') ?? $customer->country }}" placeholder="Enter Country">
                                            @error('customer_country')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('client.customers', [$client]) }}" class="btn btn-outline-danger">Back</a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
