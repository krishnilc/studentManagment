@extends('layouts.app')

@section('title', 'Index Student Management')

<!-- @section('page-title', 'Index')

@section('page-description', 'Get in touch with our team - we are here to help') -->


@section('content')


<section>
    <h2>Student List</h2>
    <div class="search">
        <form action={{ URL('student') }} method="GET">
            <div class="search">
                <input type="text" placeholder="Search students..." id="search" name="search" value="{{request('search')}}">
                <button type="submit">Search</button>
                <a href="{{ URL('student/add') }}" class="addStudentButton">Add Student</a>
            </div>
        </form>

    </div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Date of Birth</th>
                <th>Gender</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->age}}</td>
                <td>{{ $student->date_of_birth }}</td>
                <td>{{ $student->gender }}</td>
                <td> <a href="#" class="editButton">Edit</a>
                    <a href="#" class="deleteButton">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="paginationDiv">
        {{ $students->appends(request()->query())->links('pagination::bootstrap-5') }}
    </div>
</section>


@endsection