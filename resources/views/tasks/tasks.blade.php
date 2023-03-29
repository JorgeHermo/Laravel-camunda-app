<h1>Tasks</h1>

@if (request()->has('assignee'))
    <p>Filtered by assignee: {{ request()->input('assignee') }} <a href="{{ url('/tasks') }}">Clear filter</a></p>
@endif

<form method="GET" action="{{ url('/tasks') }}">
    <label for="assignee">Assignee:</label>
    <input type="text" name="assignee" value="{{ request()->input('assignee') }}">
    <button type="submit">Filter</button>
</form>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Assignee</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $task)
            <tr>
                <td>{{ $task['name'] }}</td>
                <td>{{ $task['assignee'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
