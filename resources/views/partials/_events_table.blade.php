@if ($events->count() > 0)

    <p class="d-none d-md-block">
        @auth
            Event times are presented using your currently defined time zone. ({!! link_to_route('accounts.edit', 'Update Time Zone', ['id' => Auth::user()->id]) !!})
        @else
            Event times are presented using Eastern Time Zone unless you're logged in and have defined your time zone!
        @endauth
    </p>

    <div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <th>Event</th>
        <th class="d-none d-md-block">Host</th>
        <th class="d-none d-md-block">Category</th>
        <th>Location</th>
        <th>Start Date/Time</th>
        <th class="d-none d-md-block">Attending</th>
        @if (Auth::check())
            <th>Favorited</th>
        @endif
        </thead>
        <tbody>
        @foreach ($events as $event)
            <tr>
                <td>
                    {{ link_to_route('events.show', $event->name, ['id' => $event]) }}
                    <p style="color: #8c8c8c;">{{ $event->oneliner }}</p>
                </td>
                <td class="d-none d-md-block">
                    {{ $event->organizer->first_name }}<br/>
                    <p style="color: #8c8c8c;">{{ $event->organizer->title }}</p>
                </td>
                <td class="d-none d-md-block">
                    {{ $event->category->name }}
                </td>
                <td>
                    <span class="glyphicon glyphicon-map-marker" aria-hidden></span> {{ $event->city }}
                    ,
                    {{ $event->state->name }}
                </td>
                <td>
                    {{ $event->started_at->format("M d, Y") }} @ {{ $event->started_at->format("h:ia T") }}
                </td>
                <td class="d-none d-md-block">
                    {{ $event->attendees->count() }} / {{ $event->max_attendees }}
                </td>
                @auth
                    <td>
                        <favorite event-id="{{ $event->id }}" favorited="{{ Auth::user()->favoritedEvent($event->id) }}"></favorite>
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
