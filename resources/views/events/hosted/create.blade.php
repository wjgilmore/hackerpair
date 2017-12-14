@extends('layouts.app')

@section('jumbotron')
    <div class="jumbotron">
        <div class="container">
            <h1>Create an Event</h1>
            <h2 class="d-none d-md-block">Post an event and get ready to hack with new friends!</h2>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">

        <div class="col">

            {!! Form::open(['route' => ['users.hosted-events.store', Auth::user()]], ['class' => 'form']) !!}

            @include('events.hosted._form')

            <div class="form-group">
                {!! Form::submit('Add Event', ['class' => 'btn btn-info btn-lg', 'style' => 'width: 100%']) !!}
            </div>

            {!! Form::close() !!}

        </div>

    </div>

@endsection
