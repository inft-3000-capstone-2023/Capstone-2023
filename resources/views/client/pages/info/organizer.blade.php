@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">{{ __('Organization') }}</div>

                    <div class="container col-10 pt-sm-2">
                    <ul class="nav nav-pills nav-fill">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('client.client_organizer', Auth::user()->client_id())}}">Organizer Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('client.client_team', Auth::user()->client_id())}}">Team Management</a>
                        </li>
                    </ul>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container-fluid col-10 pt-sm-2 pb-sm-2">
                    <h1>Organizer Profile</h1>
                    <hr>
                        <form class="row g-3" method="post" action="{{route('client.update_profile',$client)}}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf

                            <div class="col-md-6">
                                <label for="company_name" class="form-label">Company Name</label>
                                <input type="text" name="company_name" class="form-control @error('company_name') is-invalid @enderror" id="company_name" value="{{old('company_name') ?? $client->company_name}}"/>
                                @error('company_name')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="description" class="form-label">Company Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3">{{ old('description') ?? $client->description }}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="logo_path" class="form-label">Logo</label>
                                <div class="input-group mb-3">
                                    <input type="file" name="logo_path" class="form-control @error('logo_path') is-invalid @enderror" id="logo_path">
                                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                    @error('logo_path')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>

                        </form>

                    </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
