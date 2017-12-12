@extends('layouts.app')

@section('jumbotron')
    <div class="jumbotron">
        <div class="container">
            <h1>Launch Sequence Aborted</h1>
            <h2>We seem to have encountered an error</h2>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col">

            <p>
                We were unable to locate the information you requested. Perhaps you can find what
                you're looking for by navigating to one of the following resources:
            </p>

            <ul>
                <li>{{ link_to_route('events.index', 'Events') }}</li>
                <li>{{ link_to_route('locations.index', 'Event Locations') }}</li>
            </ul>

            <p>
                Still can't find what you're looking for? {{ link_to_route('contact.create', 'Send us a message.') }}
            </p>

        </div>
    </div>

@endsection

