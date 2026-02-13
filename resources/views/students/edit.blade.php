@extends('layouts.app')

@section('title', 'Edit Student')

@section('content')
<div class="content-container" style="padding: 2rem;">
    <div class="container maxwidth">
        <div class="page-header mb-4">
            <h1 style="font-size: 2rem; color: #333; font-weight: 700;">Edit Student</h1>
            <p style="color: #666;">Update the student's information below.</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @isset($student)
        <div class="registration-card" style="background: white; padding: 2.5rem; border-radius: 10px;">
            <form action="{{ route('students.update', $student->id) }}" method="POST" novalidate>                  
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $student->name) }}">
                    @error('name') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $student->email) }}">
                    @error('email') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Date of Birth</label>
                    <input type="date" name="date_of_birth" class="form-control @error('date_of_birth') is-invalid @enderror" value="{{ old('date_of_birth', $student->date_of_birth) }}">
                    @error('date_of_birth') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Age</label>
                    <input type="number" name="age" min="5" max="120" class="form-control @error('age') is-invalid @enderror" value="{{ old('age', $student->age) }}">
                    @error('age') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <select name="gender" class="form-select @error('gender') is-invalid @enderror">
                        <option value="">-- Select --</option>
                        <option value="male" @selected(old('gender', $student->gender)==='male')>Male</option>
                        <option value="female" @selected(old('gender', $student->gender)==='female')>Female</option>
                        <option value="other" @selected(old('gender', $student->gender)==='other')>Other</option>
                    </select>
                    @error('gender') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>

                <div class="d-flex gap-3 mt-4">
                    <button type="submit" class="btn btn-primary">Update Student</button>
                    <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
                </div>

                <input type="hidden" name="user_id" value="{{ old('user_id', $student->user_id) }}">
            </form>
        </div>
        @else
            <div class="alert alert-warning">No student selected to edit.</div>
        @endisset
    </div>
</div>

<style>
    .registration-card { max-width: 700px; margin: 0 auto; }
    .invalid-feedback { color: #dc3545; }
</style>
@endsection
