<table class="table table-hover">
    <thead>
    <th>State</th>
    <th>Upcoming Events</th>
    <th>Recently Posted</th>
    </thead>
    <tbody>
    @foreach ($states as $state)
        <tr>
            <td>
                {!! link_to_route('states.show', $state->state->name, [$state->state->abbreviation]) !!}<br/>
            </td>
            <td>
                {{ $state->total }}
            </td>
            <td>
                @include('partials._event_link', ['event' => $state->state->mostRecentEvent()])
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
