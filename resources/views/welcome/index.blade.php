@extends('layouts.full')

@section('jumbotron')
    <div class="jumbotron">
        <div class="container">
            <h1>HackerPair Helps You Build Stuff Faster.</h1>
            <h2>Learn, teach, hack, and make friends with developers in your city.</h2>
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

