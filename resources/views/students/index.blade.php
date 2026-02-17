@extends('layouts.app')

@section('title', 'Index Student Management')

<!-- @section('page-title', 'Index')

@section('page-description', 'Get in touch with our team - we are here to help') -->


@section('content')


<section>
    <style>
        .editButton,
        .deleteButton {
            display: inline-block;
            padding: 0.4rem 0.7rem;
            border-radius: 6px;
            font-size: 0.9rem;
            font-weight: 600;
            text-decoration: none;
            color: #fff;
            transition: transform 0.12s ease, box-shadow 0.12s ease, opacity 0.12s ease;
        }

        .editButton {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            box-shadow: 0 2px 6px rgba(32,199,151,0.18);
        }

        .editButton:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(32,199,151,0.22);
            opacity: 0.95;
        }

        .deleteButton {
            background: linear-gradient(135deg, #dc3545 0%, #e55353 100%);
            box-shadow: 0 2px 6px rgba(220,53,69,0.12);
            margin-left: 0.5rem;
        }

        .deleteButton:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(220,53,69,0.18);
            opacity: 0.95;
        }

        /* small responsive tweak */
        @media (max-width: 640px) {
            .editButton, .deleteButton { padding: 0.35rem 0.5rem; font-size: 0.85rem; }
        }
    </style>
    <h2>Student List</h2>
    <div class="search">
        <form action={{ URL('student') }} method="GET">
            <div class="search">
                <input type="text" placeholder="Search students..." id="search" name="search" value="{{request('search')}}">
                <button type="submit">Search</button>
                <a href="{{ URL('student/add') }}" class="addStudentButton">Add Student</a>
                <a href="{{ route('students.trash') }}" class="addStudentButton" style="background: linear-gradient(135deg, #dc3545 0%, #e55353 100%); margin-left: 0.5rem;">
                    <i class="fas fa-trash"></i> View Trash
                </a>
            </div>
        </form>

    </div>
    <table>
        <thead>
            <tr>
                <th>Avatar</th>
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
                <td>
                    @if(!empty($student->image))
                    <img src="{{ asset('storage/' . $student->image) }}" alt="Student Image" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                    @else
                    <img src="{{ asset('images/default-avatar.png') }}" alt="Default Avatar" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                    @endif
                </td>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->age}}</td>
                <td>{{ $student->date_of_birth }}</td>
                <td>{{ $student->gender }}</td>
                <td>
                    <a href="{{ route('students.edit', $student->id) }}" class="editButton">Edit</a>

                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline-block; margin:0;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="deleteButton" onclick="return confirm('Are you sure you want to delete this student?');">Delete</button>
                    </form>
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