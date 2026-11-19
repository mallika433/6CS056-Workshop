<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
</head>
<body>
    <h1>Student Details</h1>

    @if(session('success'))
        <div style="background:#e6f4ea; color:#137333; padding:10px; margin-bottom:16px; border-radius:4px;">
            {{ session('success') }}
        </div>
    @endif

    <p><strong>ID:</strong> {{ $student->id }}</p>
    <p><strong>Name:</strong> {{ $student->name }}</p>
    <p><strong>Email:</strong> {{ $student->email }}</p>
    <p><strong>Phone:</strong> {{ $student->phone }}</p>
    <p><strong>Address:</strong> {{ $student->address ?? '—' }}</p>
    <p><strong>Date of Birth:</strong> {{ $student->date_of_birth ?? '—' }}</p>

    <a href="/students/{{ $student->id }}/edit">Edit Student</a>
    &nbsp;

    <form action="/students/{{ $student->id }}" method="POST" style="display:inline;"
          onsubmit="return confirm('Are you sure you want to delete this student?')">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>

    <br><br>
    <a href="/students">Back to Students</a>

</body>
</html>
