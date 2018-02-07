@if ($users->count() > 0)

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <th>Name</th>
                <th>E-mail</th>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>
                        {{ $user->name }}
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{ $users->links('vendor.pagination.simple-bootstrap-4') }}

@else

    <p>
        No users found.
    </p>

@endif
