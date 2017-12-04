@extends('layouts.app')

@section('jumbotron')
    <div class="jumbotron">
        <div class="container">
            <h1>Edit Your Event</h1>
            <h2>Some message here</h2>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">

        <div class="col">

            {!! Form::model($event,
                [
                'route' => ['events.update', $event],
                'method' => 'put'
                ],
                ['class' => 'form']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Event Name', ['class' => 'control-label']) !!}
                {!! Form::text('name', null, ['class' => 'form-control input-lg', 'placeholder' => 'PHP Hacking and Pizza']) !!}
            </div>

            <div class="form-group">

                {!! Form::label('max_attendees', 'Maximum Number of Attendees (including you)') !!}
                {!! Form::select('max_attendees', [2,3,4,5], null, ['placeholder' => 'Maximum Number of Attendees', 'class' => 'form-control input-lg']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('description', "Description", ['class' => 'control-label']) !!}
                {!! Form::textarea('description', null, ['class' => 'form-control input-lg', 'placeholder' => 'Describe the event']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('venue', 'Venue', ['class' => 'control-label']) !!}
                {!! Form::text('venue', null, ['class' => 'form-control input-lg', 'placeholder' => 'Starbucks'] ) !!}
            </div>

            <div class="form-group">
                {!! Form::label('city', "City", ['class' => 'control-label']) !!}
                {!! Form::text('city', null, ['class' => 'form-control input-lg', 'placeholder' => 'City'] ) !!}
            </div>

            <div class="form-group">
                {!! Form::label('zip', "Zip Code", ['class' => 'control-label']) !!}
                {!! Form::text('zip', null, ['class' => 'form-control input-lg'] ) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Add Event', ['class' => 'btn btn-info btn-lg', 'style' => 'width: 100%']) !!}
            </div>

            {!! Form::close() !!}

        </div>

    </div>

@endsection
