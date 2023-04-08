@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">{{ __('Event') }}</div>

                    <div class="container col-10 pt-sm-2">
                    <ul class="nav nav-pills nav-fill">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('client.createS1', $client)}}">Basic Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('client.createS2', $client)}}">Ticket</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('client.createS3', $client)}}">Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('client.createS4', $client)}}">Publish</a>
                        </li>
                    </ul>
                    </div>

                    <div class="container-fluid col-10 pt-sm-2 pb-sm-2">
                        <h1>Details</h1>
                        <hr>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="row g-3" method="post" action="{{route('client.postcreateS3', $client)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-12">
                                <label for="path" class="form-label">Main Event Image</label>
                                <input class="form-control @error('path') is-invalid @enderror" name="path" type="file" id="path" value="{{ $event->path ?? '' }}">
                                @error('path')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="alt_text" class="form-label">Summary</label>
                                <textarea class="form-control @error('alt_text') is-invalid @enderror" name="alt_text" id="alt_text" rows="3" value="{{ $event->alt_text ?? '' }}"></textarea>
                                @error('alt_text')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="description" class="form-label">More description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3" value="{{ $event->description ?? '' }}"></textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary" name="next">Next</button>
                            </div>
                        </form>
                    </div>
                </div>


                    </div>
                </div>
        </div>
    </div>
@endsection
