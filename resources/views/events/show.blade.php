@extends('layouts.app')

@section('jumbotron')
    <div class="jumbotron">
        <div class="container">
            <div class="row">
            <div class="col-md-1 col-lg-1 event-header-date" style="line-height: 1.1; margin-top: 15px;">
                <span style="text-transform: uppercase; letter-spacing: 14px;">{{ $event->started_at->format('M') }}</span>
                <span style="font-size: 3.5em;">{{ $event->started_at->format('d') }}</span>
                <span style="letter-spacing: 0.8px; font-size: 1.7em;">{{ $event->started_at->format('Y') }}</span>
                <span style="letter-spacing: 0.4px; font-size: 1em;">{{ $event->started_at->format('H:ia') }}</span>
            </div>
            <div class="col-md-8 col-lg-8 col-sm-12">
                <h1>
                    {{ $event->name }}
                </h1>
                <p style="color: white;">

                    <span class="badge badge-primary {{ strtolower($event->category->slug) }}">{{ $event->category->name }}</span>

                    <span class="badge badge-primary">
                            <span class="glyphicon glyphicon-time"
                                  aria-hidden="true"></span> Posted {{ $event->created_at->diffForHumans() }}
                    </span>

                </p>
            </div>

            @if (Auth::check() and ! Auth::user()->isOrganizer($event))
                <ticket-box
                        event-id="{{ $event->id }}"
                        user-id="{{ Auth::user()->id }}"
                        attending-event="{{ Auth::check() and Auth::user()->isAttending($event) ? true : false }}">
                </ticket-box>
            @elseif (Auth::check() and Auth::user()->isOrganizer($event))

                <div class="col col-md-3 col-lg-3 col-sm-12 event-ticket-box">
                    <p style="text-align: center;">This is your event. </p>
                </div>

            @else

                <div class="col col-md-3 col-lg-3 col-sm-12 event-ticket-box">
                    <p style="text-align: center;">Login to join this event!</p>
                </div>

            @endif

            </div>
        </div>
    </div>
@endsection

@section('content')

    <div class="row event-bar">
        <div class="col-md-8 hidden-sm hidden-xs" style="padding-left: 0px;">
            {!! link_to_route('events.index', 'Events') !!}
            / {!! link_to_route('states.show', $event->state->name, ['id' => $event->state->abbreviation]) !!}
            / {{ $event->city }}
            / {{ $event->name }}
        </div>
        <div class="col-md-4">
            <p class="pull-right">
                <!--
                <span class="fa fa-twitter" style="padding-right: 15px;"></span>
                -->
                @if (Auth::check())
                    <favorite event-id="{{ $event->id }}"
                              favorited="{{ Auth::user()->favoritedEvent($event->id) }}"></favorite>
                @endif
            </p>
        </div>
    </div>

    <div class="row">

        <div class="col-md-9">

            @if (Auth::check() and Auth::user()->isOrganizer($event) and ! $event->isPublished())

                <div class="col-md-12" style="padding-bottom: 5px; border: 3px solid black;">
                    <h4>This Event is Not Yet Visible</h4>
                    <p>
                        You have not yet enabled this event for public viewing. If this page is
                        satisfactory, enable the event by pressing the "Enable Event" button. If you'd like
                        to make changes to the event details, press the "Edit Event" button. If you'd like
                        to delete the event, press the "Delete Event" button.
                    </p>
                    <p>
                        {!! Form::model($event, [
                            'route'  => ['events.enable', $event->id],
                            'class'  => 'form',
                            'method' => 'post',
                            'style'  => 'display: inline-block'
                            ]
                        ) !!}
                        {!! Form::submit('Enable Event', ['class' => 'btn btn-info']) !!}
                        {!! Form::close() !!}

                        {{ link_to_route('events.edit', 'Edit Event', ['id' => $event->id], ['class' => 'btn btn-info']) }}

                        {!! Form::model($event, [
                            'route'   => [ 'events.destroy', $event->id ],
                            'class'   => 'form',
                            'method'  => 'DELETE',
                            'style'   => 'display: inline-block'
                            ]
                        ) !!}
                        {!! Form::submit('Delete Event', ['type' => 'submit', 'class' => 'btn btn-warning']) !!}
                        {!! Form::close() !!}

                    </p>
                </div>

            @endif

            <h4>Description</h4>

            {!! nl2br(e($event->description)) !!}

            <h4>About Organizer {{ $event->organizer->first_name }} {{ $event->organizer->last_name }}</h4>
            <div>
                <p class="pull-right">
                    {{ $event->organizer->bio }}
                </p>
            </div>

            <h4>
                Who else is going?
            </h4>
            <h6 class="text-muted">{{ $event->attendees->count() }} of {{ $event->max_attendees }} spots filled</h6>

        </div>

        <div class="col-md-3">

            <div class="card">
                <div class="card-body">
                    <div class="card-title map">
                        <gmap-map
                                :center="{lat:{{ $event->lat }}, lng:{{ $event->lng }}}"
                                :zoom="10"
                                :options="{streetViewControl: false, mapTypeControl: false}"
                                map-type-id="roadmap"
                                style="width: 100%; height: 300px;"
                        >
                            <gmap-marker
                                    :key="index"
                                    v-for="(m, index) in [{position: {lat: {{ $event->lat }}, lng: {{ $event->lng }}}}]"
                                    :position="m.position"
                                    :clickable="true"
                                    :draggable="false"
                                    @click="center=m.position"
                            ></gmap-marker>

                        </gmap-map>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" style="border: none;">
                                <span class="fa fa-building" style="color: #FFC200; padding-right: 5px;" aria-hidden></span>
                                {{ $event->venue }}
                            </li>
                            <li class="list-group-item" style="border: none;">
                                <span class="fa fa-map" style="color: #FFC200; padding-right: 5px;" aria-hidden></span>
                                {{ $event->street }}
                            </li>
                            <li class="list-group-item" style="border: none;">
                                <span class="fa fa-map-signs" style="color: #FFC200; padding-right: 5px;" aria-hidden></span>
                                {{ $event->city }}, {{ $event->state->abbreviation }} {{ $event->zip }}</li>
                            <li class="list-group-item" style="border: none;">
                                <span class="fa fa-calendar" style="color: #FFC200; padding-right: 5px;" aria-hidden></span>
                                {{ $event->started_at->format('M d, Y H:ia') }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <br />

            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h4>Nearby Events</h4>
                        <p>
                            @forelse (App\Event::upcoming()->where('id', '!=', $event->id)->nearby($event->lat, $event->lng, 500)->get()->take(5) as $nearbyEvent)
                                {!! link_to_route('events.show', $nearbyEvent->name, ['id' => $nearbyEvent->id]) !!}<br/>
                        @empty
                            <p>
                                No nearby events found!
                            </p>
                            @endforelse
                            </p>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <br /><br />

@endsection

