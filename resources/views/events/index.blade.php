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

        <div class="row">
                <div class="col">

                        <ul>
                                @foreach ($events as $event)
                                        <li>{{ $event }}</li>
                                @endforeach
                        </ul>

                </div>
        </div>

@endsection
