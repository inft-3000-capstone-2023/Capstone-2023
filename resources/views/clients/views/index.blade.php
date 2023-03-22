@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Clients Page') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
{{--                        <a class="btn btn-primary d-grid gap-6" href="{{route('posts.create')}}">Create New Post</a>--}}
                            <style>
                            .img-thumbnail {
                                width: 70px;
                                height: 70px;
                                max-width: 30%;
                                max-height: 30%;
                                padding: 15px;
                                border: 3px solid black;
                            }
                            /*img {*/
                            /*width: 40%;*/
                            /*height: 40%;*/
                            /*}*/
                            </style>
                            <div>
{{--                            <img src="/ClientNavIcons/HomeIcon.png" alt="..." class="img-thumbnail">--}}
                            <ul class="nav flex-column" >
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('clients.index')}}"><img id="navImg" src="/client_nav_icons/home1.png" alt="..."  class="img-thumbnail"></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><img id="navImg" src="/client_nav_icons/CalendarIcon.ico" alt="..." class="img-thumbnail"></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><img id="navImg" src="/client_nav_icons/FinancialIcon.ico" alt="..." class="img-thumbnail"></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><img id="navImg" src="/client_nav_icons/OrganizationIcon.ico" alt="..." class="img-thumbnail"></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="#"><img id="navImg" src="/client_nav_icons/HelpIcon.ico" alt="..." class="img-thumbnail"></a>
                                </li>
                            </ul>


                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
