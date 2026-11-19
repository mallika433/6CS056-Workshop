<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>
    <h1>Edit Student</h1>

    <form action="/students/{{ $student->id }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Name</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $student->name) }}"
            >
            @error('name') <p style="color:red;">{{ $message }}</p> @enderror
        </div>

        <br>

        <div>
            <label for="email">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email', $student->email) }}"
            >
            @error('email') <p style="color:red;">{{ $message }}</p> @enderror
        </div>

        <br>

        <div>
            <label for="phone">Phone</label>
            <input
                type="text"
                id="phone"
                name="phone"
                value="{{ old('phone', $student->phone) }}"
            >
            @error('phone') <p style="color:red;">{{ $message }}</p> @enderror
        </div>

        <br>

        <div>
            <label for="address">Address</label>
            <textarea id="address" name="address">{{ old('address', $student->address) }}</textarea>
            @error('address') <p style="color:red;">{{ $message }}</p> @enderror
        </div>

        <br>

        <div>
            <label for="date_of_birth">Date of Birth</label>
            <input
                type="date"
                id="date_of_birth"
                name="date_of_birth"
                value="{{ old('date_of_birth', $student->date_of_birth) }}"
            >
            @error('date_of_birth') <p style="color:red;">{{ $message }}</p> @enderror
        </div>

        <br>

        <button type="submit">Update Student</button>

        @if($errors->any())
            <div style="margin-top:12px;">
                <h3>Please fix the following errors:</h3>
                <ul>
                    @foreach($errors->all() as $error)
                        <li style="color:red;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </form>

    <br>
    <a href="/students/{{ $student->id }}">Back to Student</a>
    &nbsp;|&nbsp;
    <a href="/students">Back to Students</a>

</body>
</html>
