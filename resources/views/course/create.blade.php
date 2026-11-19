<!DOCTYPE html>
<html>
<head>
    <title>Create Course</title>
</head>
<body>
    <h1>Create Course</h1>

    <form action="/courses" method="POST">
        @csrf

        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
            @error('name') <p style="color:red;">{{ $message }}</p> @enderror
        </div>

        <br>

        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description">{{ old('description') }}</textarea>
            @error('description') <p style="color:red;">{{ $message }}</p> @enderror
        </div>

        <br>

        <div>
            <label for="duration">Duration (weeks)</label>
            <input type="number" id="duration" name="duration" min="1" value="{{ old('duration') }}">
            @error('duration') <p style="color:red;">{{ $message }}</p> @enderror
        </div>

        <br>

        <div>
            <label for="fee">Fee</label>
            <input type="number" id="fee" name="fee" step="0.01" min="0" value="{{ old('fee') }}">
            @error('fee') <p style="color:red;">{{ $message }}</p> @enderror
        </div>

        <br>

        <div>
            <label for="difficulty">Difficulty</label>
            <select id="difficulty" name="difficulty">
                <option value="">-- Select --</option>
                @foreach(['Easy', 'Medium', 'Hard'] as $level)
                    <option value="{{ $level }}" {{ old('difficulty') === $level ? 'selected' : '' }}>
                        {{ $level }}
                    </option>
                @endforeach
            </select>
            @error('difficulty') <p style="color:red;">{{ $message }}</p> @enderror
        </div>

        <br>

        <div>
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" id="is_active" name="is_active" value="1"
                {{ old('is_active', '1') ? 'checked' : '' }}>
            <label for="is_active">Active</label>
        </div>

        <br>

        <button type="submit">Create Course</button>

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
    <a href="/courses">Back to Courses</a>

</body>
</html>
