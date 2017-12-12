@extends('layouts.full')

@section('jumbotron')
    <div class="jumbotron">
        <div class="container">
            <h1>Event Locations</h1>
            <h2>Events summarized by city and state</h2>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">

            <div style="padding: 15px 0px 15px 0px;">
                {!! link_to_route('welcome.index', 'Home') !!} &gt; Locations
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <h4>Upcoming Events by State</h4>
            @include('partials._states_table', ['states' => $states])
        </div>

        <div class="col-md-6">

            <h4>Popular Cities</h4>

            <table class="table table-hover">
                <thead>
                <th>City</th>
                <th>State</th>
                <th>Upcoming Events</th>
                </thead>
                <tbody>
                @foreach ($cities as $city)
                    <tr>
                        <td>
                            {{ $city->city }}
                        </td>
                        <td>
                            {{ $city->state->name }}<br/>
                        </td>
                        <td>
                            {{ $city->total }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

    </div>

@endsection

