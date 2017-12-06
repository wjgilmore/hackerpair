@extends('layouts.full')

@section('jumbotron')
    <div class="jumbotron">
        <div class="container">
            <h1 style="color: white; font-size: 4.0em; font-weight: 900; margin-top: 10px; margin-bottom: 2px;">{{ $state->name }} Event Locations</h1>
            <p style="font-size: 2em; margin-top: 3px; color: #D9A648; font-weight: 700;">
                Popular categories in {{ $state->name }}:
                @foreach($state->popularCategories() as $pc)
                    {{ $pc->name }}
                @endforeach
            </p>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">



        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div style="padding: 15px 0px 15px 0px;">
                {!! link_to_route('locations.index', 'Locations') !!} &gt; {!! link_to_route('states.index', 'States') !!} &gt; {{ $state->name }}
            </div>

            @include('partials/_events_table', ['events' => $events])

        </div>

    </div>

@endsection
