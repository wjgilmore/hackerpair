@extends('layouts.full')

@section('jumbotron')
    <div class="jumbotron">
        <div class="container">
            <h1>Events</h1>
            <h2>Find an event that interests you!</h2>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col mh-100">

            @include('partials/_events_table', ['events' => $events])

        </div>
    </div>

@endsection
