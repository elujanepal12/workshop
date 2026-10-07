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
        <label>Name:</label>
        <input type="text" name="name" value="{{ $student->name }}">
    </div>

    <br>

    <div>
        <label>Email:</label>
        <input type="email" name="email" value="{{ $student->email }}">
    </div>

    <br>

    <div>
        <label>Phone:</label>
        <input type="text" name="phone" value="{{ $student->phone }}">
    </div>

    <br>

    <div>
        <label>Address:</label>
        <textarea name="address">{{ $student->address }}</textarea>
    </div>

    <br>

    <div>
        <label>Date of Birth:</label>
        <input type="date" name="date_of_birth" value="{{ $student->date_of_birth }}">
    </div>

    <br>

    <button type="submit">Update Student</button>

</form>

<br>

<a href="/students/{{ $student->id }}">Cancel</a>

</body>
</html>