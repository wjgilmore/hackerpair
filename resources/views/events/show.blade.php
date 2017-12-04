@extends('layouts.app')

@section('content')

    <h1>{{ $event->name }}</h1>

    <p>
        City: {{ $event->city }} <br />
        Venue: {{ $event->venue }}
    </p>

    <h2>Description</h2>
    <p>
        {{ $event->description }}
    </p>

    {{ link_to_route('events.edit', 'Edit Event', ['event' => $event])}}

    <br />

    {!! Form::open(
  [
    'route' => ['events.destroy', $event],
    'method' => 'delete'
  ]) !!}
    {!! Form::submit('Delete Event', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}

@endsection
