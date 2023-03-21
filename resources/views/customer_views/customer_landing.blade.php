@extends('customer_views.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="home-banner">
            @include('customer_views.layouts.hero')
        </div>
        <div class="col-md-8">
            <div class="card">
                <table>
                    <tbody>
                    @foreach($events as $event)
                        <tr>
                            <td>{{date('m-d', strtotime($event->date_time))}}</td>
                            <td>Arena Name - {{$event->city}}, {{$event->province}}</td>
                            <td><button class="btn-primary" >See Tickets</button></td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection
