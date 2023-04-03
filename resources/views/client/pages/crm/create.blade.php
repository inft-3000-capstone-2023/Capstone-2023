@extends('client.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create New Customer') }}</div>

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

                        <form method="POST" action="{{ route('client.customers.store', $client->id) }}">
                            @csrf
                            <div class="mb-3">
                                <label for="customer_name">Customer Name</label>
                                <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ old('customer_name') }}" placeholder="Enter Customer Name">
                                @error('customer_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="customer_email">Customer Email</label>
                                <input type="text" class="form-control" id="customer_email" name="customer_email" value="{{ old('customer_email') }}" placeholder="Enter Customer Email">
                                @error('customer_email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('client.customers', $client) }}" class="btn btn-danger">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
