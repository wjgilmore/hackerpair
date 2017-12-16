@extends('layouts.app')

@section('jumbotron')
    <div class="jumbotron">
        <div class="container">
            <h1>Edit Your Event</h1>
            <h2>Update Your Event Details</h2>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">

        <div class="col">

            {!! Form::model($event,
                [
                'route' => ['users.hosted.update', Auth::user(), $event],
                'method' => 'put'
                ],
                ['class' => 'form']) !!}

            @include('events.hosted._form')

            <div class="form-group">
                {!! Form::submit('Edit Event', ['class' => 'submit btn btn-info btn-lg', 'style' => 'width: 100%']) !!}
            </div>

            {!! Form::close() !!}

        </div>

    </div>

@endsection
