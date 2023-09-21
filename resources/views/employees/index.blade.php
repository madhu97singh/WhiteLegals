@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Employee List</h1>
        <a href="{{ route('employees.create') }}" class="btn btn-primary">Add Employee</a>
        <a href="{{ route('home') }}" class="btn btn-primary">Back to Home Page</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Stauts</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>
                        @if ($employee->status == 'active')
                        <button class="btn btn-sm btn-danger toggle-status" data-user="{{ $employee->id }}">
                            Click to Activate
                        </button>
                        @else
                        <button class="btn btn-sm btn-success toggle-status" data-user="{{ $employee->id }}">
                            Click to Inactive
                        </button>
                        @endif

                        </td>
                    <td>
                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this employee?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript">
    // AJAX request to toggle user status
    $('.toggle-status').click(function() {
        var userId = $(this).attr('data-user');
        $.ajax({
            type: 'POST',
            url: '/employees/' + userId ,
            data: {
                _token: '{{ csrf_token() }}',
                userId : userId
            },
            success: function(response) {
                // Reload the page or update the UI as needed
                location.reload();
            },
            error: function(error) {
                console.error(error);
                alert('Error toggling user status.');
            }
        });
    });
</script>
@endsection