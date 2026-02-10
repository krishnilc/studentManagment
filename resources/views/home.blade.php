<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
</head>
<body>
    <h1>Welcome to Student Management System</h1>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Grade</th>
            </tr>
        </thead>
        {{-- <tbody>
            @forelse($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->grade }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No students found</td>
                </tr>
            @endforelse
        </tbody> --}}
    </table>
       

</body>
</html>
