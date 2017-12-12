@if ($events->count() > 0)

    <p class="d-none d-md-block">
        @auth
            Event times are presented using the {{ Auth::user()->timezone_abbreviation }} time zone. ({!! link_to_route('accounts.edit', 'Update Time Zone', ['id' => Auth::user()->id]) !!})
        @else
            Event times are presented using Eastern Time Zone unless you're logged in and have defined your time zone!
        @endauth
    </p>

    <div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <th>Event</th>
            <th>Host</th>
            <th>Category</th>
            <th>Location</th>
            <th>Start Date/Time</th>
            <th>Attending</th>
            @auth
                <th>Favorited</th>
                <th></th>
            @endauth
        </thead>
        <tbody>
        @foreach ($events as $event)
            <tr>
                <td>
                    {{ link_to_route('events.show', $event->name, ['id' => $event]) }}
                    <p style="color: #8c8c8c;">{{ $event->oneliner }}</p>
                </td>
                <td>
                    {{ $event->organizer->first_name }}<br/>
                    <p style="color: #8c8c8c;">{{ $event->organizer->title }}</p>
                </td>
                <td>
                    {{ $event->category->name }}
                </td>
                <td>
                    <span class="fa fa-map-marker" aria-hidden></span> {{ $event->city }},
                    {!! link_to_route('states.show', $event->state->name, [$event->state->abbreviation]) !!}
                </td>
                <td>
                    {{ $event->start_date }} @ {{ $event->start_time }}
                </td>
                <td>
                    {{ $event->attendees->count() }} / {{ $event->max_attendees }}
                </td>
                @auth
                    <td>
                        <favorite event-id="{{ $event->id }}" favorited="{{ Auth::user()->favoritedEvent($event->id) }}"></favorite>
                    </td>
                <td>
                    @if(Auth::user()->id == $event->organizer->id)
                        organizer
                    @endif
                </td>
                @endauth
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>

    {{ $events->links('vendor.pagination.simple-bootstrap-4') }}

@else

    <p>
        No events found.
    </p>

@endif
