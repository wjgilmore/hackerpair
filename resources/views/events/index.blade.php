@extends('layouts.app')

@section('jumbotron')
    <div class="jumbotron">
        <div class="container">
            <h1>Events</h1>
            <h2>Find an event that interests you!</h2>
        </div>
    </div>
@endsection

@section('content')

    <h1>Events</h1>

    <ul>
        @forelse ($events as $event)
            <li>{{ link_to_route('events.show', $event->name, ['slug' => $event->slug]) }}</li>
        @empty
            <li>No events found!</li>
        @endforelse
    </ul>

    {!! $events->links('vendor.pagination.simple-bootstrap-4') !!}

@endsection
