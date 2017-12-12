@extends('layouts.app')

@section('jumbotron')
    <div class="jumbotron">
        <div class="container">
            <h1>{{ $event->name }}</h1>
            <h2>{{ $event->oneliner }}</h2>
            <p style="color: white;">

                <span class="badge badge-primary {{ strtolower($event->category->slug) }}">{{ $event->category->name }}</span>

                <span class="badge badge-primary">
                        <span class="fa fa-clock-o"
                              aria-hidden="true"></span> Posted {{ $event->created_at->diffForHumans() }}
                </span>

            </p>
        </div>
    </div>
@endsection

@section('content')

    <div class="row event-bar row-no-padding">
        <div class="col-md-8 hidden-sm hidden-xs text-muted">
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

    <div class="row row-no-padding">

        <div class="col-md-9">

            {!! preg_replace('/\R+/', '<br /><br />', e($event->description)) !!}

            <h4>About Organizer {{ $event->organizer->first_name }} {{ $event->organizer->last_name }}</h4>

            <p>
                @if (is_null($event->organizer->bio))
                    The organizer has not added a bio.
                @else
                    {{ $event->organizer->bio }}
                @endif
            </p>

            <h4>Nearby Events</h4>
            @forelse (App\Event::upcoming()->where('id', '!=', $event->id)->nearby($event->lat, $event->lng, 500)->get()->take(5) as $nearbyEvent)
                <p>
                <b>{!! link_to_route('events.show', $nearbyEvent->name, ['id' => $nearbyEvent]) !!}</b> ({{ round($nearbyEvent->distance, 2) }} miles)<br />
                {{ $nearbyEvent->oneliner }}

                </p>
            @empty
                <p>
                    No nearby events found!
                </p>
            @endforelse

        </div>

        <div class="col-md-3">

            <div class="card">
                <div class="card-body">

                    @if (Auth::check() and ! Auth::user()->isOrganizer($event))
                        <ticket-box
                                event-id="{{ $event->id }}"
                                user-id="{{ Auth::user()->id }}"
                                attendee-max="{{ $event->max_attendees }}"
                                attendee-count="{{ $event->attendees->count() }}"
                                attending-event="{{ Auth::check() and Auth::user()->isAttending($event) ? true : false }}">
                        </ticket-box>
                    @elseif (Auth::check() and Auth::user()->isOrganizer($event))

                        <div class="event-ticket-box">
                            <p style="text-align: center;">
                                This is your event.<br />
                                {!! link_to_route('events.edit', 'Edit Event Details', ['event' => $event]) !!}
                            </p>
                        </div>

                    @else

                        <div class="event-ticket-box">
                            <p style="text-align: center;">Login to join this event!</p>
                        </div>

                    @endif
                </div>
            </div>

            <br />

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
                                {{ $event->start_date }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <br /><br />

@endsection

