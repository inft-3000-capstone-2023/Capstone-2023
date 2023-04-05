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
                            <a class="nav-link " href="{{route('client.client_organizer', Auth::user()->client_id())}}">Organizer Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"  href="{{route('client.client_team', Auth::user()->client_id())}}">Team Management</a>
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
                        <form method="post" action="{{route('client.team_update', $client_user->id)}}">
                            @method('PUT')
                            @csrf
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Roles</th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse($client_users as $client_user)
                                    <tr>
                                        <td>{{$client_user->name()}}</td>
                                        <td>
                                            @foreach($client_user->roles as $role)
                                                <p>{{$role->name}}</p>
                                            @endforeach
                                        </td>
                                    </tr>
                                @empty
                                    <p>No team member to show</p>
                                @endforelse
                                </tbody>
                            </table>

                            <div class="mb-3">
                                <label for="role_id" class="form-label">Role</label>
                                @foreach($roles as $role)
                                    <div class="form-check">
                                        @php $checked = '' @endphp
                                        @if(old('role_ids'))
                                            @if(in_array($role->id, old('role_ids')))
                                                @php $checked = 'checked' @endphp
                                            @endif
                                        @endif
                                        <input {{$checked}} class="form-check-input" name="role_ids[]" type="checkbox" value="{{$role->id}}" id="role-{{$role->id}}">
                                        <label class="form-check-label" for="role-{{$role->id}}">
                                            {{$role->name}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <button type="submit" class="btn btn-primary">Update team member</button>
                            <a href="{{ route('client.client_team', Auth::user()->client_id()) }}" class="btn btn-outline-danger">Cancel</a>
                        </form>
                    </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
