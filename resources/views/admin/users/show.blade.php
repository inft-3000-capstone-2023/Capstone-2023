@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Show Admin User') }}</div>

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
                            <h4>User Id</h4>
                            <p>{{ $user->id }}</p>
                        </div>
                        <div class="mb-3">
                            <h4>User Name</h4>
                            <p>{{ $user->name }}</p>
                        </div>
                        <div class="mb-3">
                            <h4>Email</h4>
                            <p>{{ $user->email }}</p>
                        </div>
                        <a href="{{ route('list_users') }}" class="btn btn-outline-danger">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
