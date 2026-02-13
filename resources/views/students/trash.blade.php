@extends('layouts.app')

@section('title', 'Deleted Students')

@section('content')

<section style="padding: 2rem;">
    <style>
        .restoreButton {
            display: inline-block;
            padding: 0.4rem 0.7rem;
            border-radius: 6px;
            font-size: 0.9rem;
            font-weight: 600;
            text-decoration: none;
            color: #fff;
            background: linear-gradient(135deg, #ffc107 0%, #ff9800 100%);
            box-shadow: 0 2px 6px rgba(255, 193, 7, 0.18);
            border: none;
            cursor: pointer;
            transition: transform 0.12s ease, box-shadow 0.12s ease, opacity 0.12s ease;
        }

        .restoreButton:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 14px rgba(255, 193, 7, 0.22);
            opacity: 0.95;
        }

        .emptyState {
            text-align: center;
            padding: 3rem 1rem;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .emptyState h3 {
            color: #666;
            margin-bottom: 1rem;
        }

        .emptyState a {
            display: inline-block;
            margin-top: 1rem;
            padding: 0.6rem 1.2rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .emptyState a:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        thead {
            background: #f8f9fa;
            border-bottom: 2px solid #e9ecef;
        }

        th {
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            color: #333;
        }

        td {
            padding: 0.9rem 1rem;
            border-bottom: 1px solid #e9ecef;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tbody tr:hover {
            background-color: #f5f5f5;
        }
    </style>

    <h2 style="margin-bottom: 2rem; color: #333; font-weight: 700;">
        <i class="fas fa-trash"></i> Deleted Students
    </h2>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" style="margin-bottom: 1.5rem; border-radius: 8px;">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" style="margin-bottom: 1.5rem; border-radius: 8px;">
            <i class="fas fa-times-circle"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if($students->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Deleted At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->age }}</td>
                    <td>{{ $student->date_of_birth }}</td>
                    <td>{{ $student->gender }}</td>
                    <td>{{ $student->deleted_at->format('M d, Y H:i') }}</td>
                    <td>
                        <form action="{{ route('students.restore', $student->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="restoreButton" onclick="return confirm('Restore this student?');">
                                <i class="fas fa-undo"></i> Restore
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="paginationDiv" style="margin-top: 2rem;">
            {{ $students->appends(request()->query())->links('pagination::bootstrap-5') }}
        </div>
    @else
        <div class="emptyState">
            <i class="fas fa-inbox" style="font-size: 3rem; color: #ccc; margin-bottom: 1rem;"></i>
            <h3>No deleted students yet</h3>
            <p style="color: #999;">When you delete students, they'll appear here.</p>
            <a href="{{ route('students.index') }}">
                <i class="fas fa-arrow-left"></i> Back to Students
            </a>
        </div>
    @endif

    <div style="margin-top: 2rem;">
        <a href="{{ route('students.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Back to Active Students
        </a>
    </div>
</section>

@endsection
