@extends('layouts.app')
{{--{{ dd($client) }}--}}
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Client') }}</div>

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

{{--                        {{ dd($client->id) }}--}}

                        <form method="POST" action="{{ route('admin.update', $client) }}">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="company_name">Company Name</label>
                                <input type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name') ?? $client->company_name }}" placeholder="Enter Company Name">
                                @error('company_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description">Company Description</label>
                                <input type="text" class="form-control" id="description" name="description" value="{{ old('description') ?? $client->description }}"placeholder="Enter Company Description">
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('admin.index') }}" class="btn btn-outline-danger">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
