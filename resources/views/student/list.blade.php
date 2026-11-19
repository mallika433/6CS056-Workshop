<!DOCTYPE html>
<html>
<head>
    <title>Students</title>
</head>
<body>
    <h1>Students</h1>

    @if(session('success'))
        <div style="background:#e6f4ea; color:#137333; padding:10px; margin-bottom:16px; border-radius:4px;">
            {{ session('success') }}
        </div>
    @endif

    <a href="/students/create">Create Student</a>

    <table border="1" cellpadding="8" cellspacing="0" style="margin-top:16px; border-collapse:collapse;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>
                        <a href="/students/{{ $student->id }}">View</a>
                        &nbsp;
                        <a href="/students/{{ $student->id }}/edit">Edit</a>
                        &nbsp;
                        <form action="/students/{{ $student->id }}" method="POST" style="display:inline;"
                              onsubmit="return confirm('Are you sure you want to delete this student?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No students found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <br>
    <a href="/courses">Go to Courses</a>

</body>
</html>
