<!-- resources/views/layouts/sidebar.blade.php -->

<div class="bg-white shadow-md h-100 w-60 overflow-auto ">

    <!-- Navigation Links -->
    <div class="list-group">
        @if(Auth::check())

        <a href="{{ route('client.dashboard',['client' => Auth::user()->client_id()]) }}" class="list-group-item list-group-item-action {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="mr-4">
                <!-- Dashboard icon -->
            </i>
            {{ __('Dashboard') }}
        </a>
        <a href="{{ route('client.client_events',['client' => Auth::user()->client_id()]) }}" class="list-group-item list-group-item-action">
            <i class="mr-4">
                <!-- Event icon -->
            </i>
            {{ __('Event') }}
        </a>
        <a href="{{ route('client.customers',['client' => Auth::user()->client_id()]) }}" class="list-group-item list-group-item-action">
            <i class="mr-4">
                <!-- My Customer icon -->
            </i>
            {{ __('My Customer') }}
        </a>
        <a href="{{ route('client.client_organizer',['client' => Auth::user()->client_id()]) }}" class="list-group-item list-group-item-action">
            <i class="mr-4">
                <!-- My Organizer icon -->
            </i>
            {{ __('My Organizer') }}
        </a>
        @endif
    </div>
</div>
