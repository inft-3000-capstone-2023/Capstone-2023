@extends('client.layouts.search')

@section('content')
    @if(count($lists) > 0)
        <div class="event-list">
            @foreach($lists as $list)
                <div class="event">
                    <h2>{{ $list->event_title }}</h2>
                    <p>{{ $list->event_description }}</p>
                    <p>Date & Time: {{ $list->date_time->format('F j, Y, g:i A') }}</p>
                </div>
            @endforeach
        </div>
    @else
        <p>No search results found.</p>
    @endif
@endsection
