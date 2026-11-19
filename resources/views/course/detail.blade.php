<!DOCTYPE html>
<html>
<head>
    <title>Course Details</title>
</head>
<body>
    <h1>Course Details</h1>

    @if(session('success'))
        <div style="background:#e6f4ea; color:#137333; padding:10px; margin-bottom:16px; border-radius:4px;">
            {{ session('success') }}
        </div>
    @endif

    <p><strong>ID:</strong> {{ $course->id }}</p>
    <p><strong>Name:</strong> {{ $course->name }}</p>
    <p><strong>Description:</strong> {{ $course->description ?? '—' }}</p>
    <p><strong>Duration:</strong> {{ $course->duration }} weeks</p>
    <p><strong>Fee:</strong> {{ number_format($course->fee, 2) }}</p>
    <p><strong>Difficulty:</strong> {{ $course->difficulty }}</p>
    <p><strong>Active:</strong> {{ $course->is_active ? 'Yes' : 'No' }}</p>

    <a href="/courses/{{ $course->id }}/edit">Edit Course</a>
    &nbsp;

    <form action="/courses/{{ $course->id }}" method="POST" style="display:inline;"
          onsubmit="return confirm('Are you sure you want to delete this course?')">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>

    <br><br>
    <a href="/courses">Back to Courses</a>

</body>
</html>
