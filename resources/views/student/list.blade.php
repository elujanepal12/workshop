<!DOCTYPE html>
<html>
<head>
    <title>Students</title>
</head>
<body>

<h1>Students</h1>

<a href="/student/create">Add New Student</a>

<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Date of Birth</th>
        <th>Actions</th>
    </tr>

    @forelse($students as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->phone }}</td>
            <td>{{ $student->address }}</td>
            <td>{{ $student->date_of_birth }}</td>
            <td>
                <a href="/students/{{ $student->id }}">View</a>
                |
                <a href="/students/{{ $student->id }}/edit">Edit</a>
                <form action="/students/{{ $student->id }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')

    <button type="submit" onclick="return confirm('Are you sure you want to delete this student?')">
        Delete
    </button>
</form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="7">No students found.</td>
        </tr>
    @endforelse

</table>

</body>
</html>