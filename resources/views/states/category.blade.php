@extends('layouts.fluid')

@section('jumbotron')
    <div class="jumbotron">
        <div class="container">
            <h1>{{ $state->name }} {{ $category->name }} Events</h1>
            <h2>
                Check out the {{ $category->name }} events in {{ $state->name }}
            </h2>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">

            <div style="padding: 15px 0px 15px 0px;">
                {!! link_to_route('locations.index', 'Locations') !!} &gt;
                {!! link_to_route('states.index', 'States') !!} &gt;
                {!! link_to_route('states.show', $state->name, ['id' => $state->abbreviation]) !!} &gt;
                {{ $language->name }}
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Upcoming {{ $category->name }} Events in {{ $state->name }}</h4>
                    <p class="card-text">

                        @include('partials/_events_table', ['events' => $events])

                    </p>
                </div>
            </div>

        </div>

    </div>

@endsection
