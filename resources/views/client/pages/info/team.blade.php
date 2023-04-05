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
                            <a class="nav-link " href="{{route('client.client_organizer', $client)}}">Organizer Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"  href="{{route('client.client_team', $client)}}">Team Management</a>
                        </li>
                    </ul>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container-fluid col-10 pt-sm-2 pb-sm-2">
                    <h1>Team Management</h1>
                    <hr>
                        <div class="mb-3">
                            <form method="post" action="{{route('client.invite_team_member', $client->id)}}" class="d-flex">
                                @csrf
                                <div class="input-group">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter email to invite team member" required>
                                    <button class="btn btn-primary" type="submit">Invite</button>
                                </div>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </form>
                        </div>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Roles</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>

                            <tbody>
                                @forelse($client_users as $client_user)
                                    <tr>
                                        <td>{{$client_user->name()}}</td>
                                        <td>{{ $client_user->email() }}</td>
                                        <td>
                                            @foreach($client_user->roles as $role)
                                                <span>{{ $role->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <form action="{{route('client.update_profile',$client)}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <a href="{{route('client.team_edit',$client)}}"><button type="button" class="btn btn-warning">Edit</button></a>
                                                <button type="submit" class="btn btn-danger">DELETE</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <p>No team member to show</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
