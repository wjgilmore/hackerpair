<table class="table table-hover">
    <thead>
    <th>Category</th>
    <th>Upcoming Events</th>
    <th>Recently Posted</th>
    </thead>
    <tbody>
    @foreach ($categories as $category)
        <tr>
            <td>
                {{ $category->name }}<br/>
            </td>
            <td>
                {{ $category->events->count() }}
            </td>
            <td>
                @if ($category->events->count() > 0)
                    @include('partials._event_link', ['event' => $category->mostRecentEvent()])
                @else
                    N/A
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
