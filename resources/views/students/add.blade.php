@extends('layouts.app')

@section('title', 'Student Registration')

@section('content')
<div class="content-container" style="padding: 2rem;">
    <div class="container maxwidth">
        <!-- Page Header -->
        <div class="page-header mb-5">
            <h1 style="font-size: 2.5rem; color: #333; margin-bottom: 0.5rem; font-weight: 700;">
                <i class="fas fa-user-plus"></i> Student Registration
            </h1>
            <p style="color: #666; font-size: 1rem;">Fill out the form below to register as a new student</p>
        </div>

        <!-- Display Messages -->
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h5 class="alert-heading">
                <i class="fas fa-exclamation-circle"></i> Validation Errors
            </h5>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-times-circle"></i> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <!-- Registration Form Card -->
        <div class="registration-card"
            style="background: white; border-radius: 12px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); padding: 3rem;">
            <form action="{{ route('students.store') }}" method="POST" novalidate>
                @csrf

                <!-- Full Name -->
                <div class="mb-4">
                    <label for="name" class="form-label fw-bold">
                        <i class="fas fa-user"></i> Full Name <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        value="{{ old('name') }}" placeholder="Enter your full name" required>
                    @error('name')
                    <div class="invalid-feedback d-block">
                        <i class="fas fa-times-circle"></i> {{ $message }}
                    </div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="form-label fw-bold">
                        <i class="fas fa-envelope"></i> Email Address <span class="text-danger">*</span>
                    </label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" value="{{ old('email') }}" placeholder="Enter your email address" required>
                    @error('email')
                    <div class="invalid-feedback d-block">
                        <i class="fas fa-times-circle"></i> {{ $message }}
                    </div>
                    @enderror
                </div>

                <!-- Date of Birth -->
                <div class="mb-4">
                    <label for="date_of_birth" class="form-label fw-bold">
                        <i class="fas fa-calendar-alt"></i> Date of Birth <span class="text-danger">*</span>
                    </label>
                    <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror"
                        id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                    <small class="form-text text-muted">You must be at least 5 years old to register</small>
                    @error('date_of_birth')
                    <div class="invalid-feedback d-block">
                        <i class="fas fa-times-circle"></i> {{ $message }}
                    </div>
                    @enderror
                </div>

                <!-- Age -->
                <div class="mb-4">
                    <label for="age" class="form-label fw-bold">
                        <i class="fas fa-birthday-cake"></i> Age <span class="text-danger">*</span>
                    </label>
                    <input type="number" class="form-control @error('age') is-invalid @enderror" id="age" name="age"
                        value="{{ old('age') }}" placeholder="Enter your age" min="5" max="120" required>
                    @error('age')
                    <div class="invalid-feedback d-block">
                        <i class="fas fa-times-circle"></i> {{ $message }}
                    </div>
                    @enderror
                </div>

                <!-- Gender -->
                <div class="mb-4">
                    <label for="gender" class="form-label fw-bold">
                        <i class="fas fa-venus-mars"></i> Gender <span class="text-danger">*</span>
                    </label>
                    <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender"
                        required>
                        <option value="">-- Select Gender --</option>
                        <option value="male" @selected(old('gender')==='male' )>Male</option>
                        <option value="female" @selected(old('gender')==='female' )>Female</option>
                        <option value="other" @selected(old('gender')==='other' )>Other</option>
                    </select>
                    @error('gender')
                    <div class="invalid-feedback d-block">
                        <i class="fas fa-times-circle"></i> {{ $message }}
                    </div>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="form-actions d-flex gap-3 mt-5">
                    <button type="submit" class="btn btn-primary btn-lg flex-grow-1">
                        <i class="fas fa-check-circle"></i> Register Student
                    </button>
                    <a href="{{ route('students.index') }}" class="btn btn-secondary btn-lg">
                        <i class="fas fa-arrow-left"></i> Cancel
                    </a>
                </div>
                <!-- Hidden field to pass a predefined value for user_id --> 
                <input type="hidden" name="user_id" id="user_id" value="3">
            </form>
        </div>

        <!-- Information Box -->
        <div class="info-box mt-5"
            style="background: #e7f3ff; border-left: 4px solid #2196F3; padding: 1.5rem; border-radius: 8px;">
            <h5 style="color: #1976D2; margin-bottom: 0.5rem;">
                <i class="fas fa-info-circle"></i> Registration Information
            </h5>
            <p style="color: #555; margin: 0;">
                Please ensure all information is accurate and up-to-date. You can update your profile
                information after registration. All fields marked with <span class="text-danger">*</span> are required.
            </p>
        </div>
    </div>
</div>

<style>
    .registration-card {
        max-width: 600px;
        margin: 0 auto;
    }

    .form-label {
        color: #333;
        margin-bottom: 0.5rem;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    }

    .form-control::placeholder {
        color: #999;
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #5568d3 0%, #613a8f 100%);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.4);
    }

    .page-header {
        text-align: center;
        border-bottom: 2px solid #f0f0f0;
        padding-bottom: 2rem;
    }

    .alert {
        border-radius: 8px;
        border: none;
    }

    .alert-danger {
        background-color: #ffebee;
        color: #c62828;
    }

    .alert-success {
        background-color: #e8f5e9;
        color: #2e7d32;
    }

    .invalid-feedback {
        color: #dc3545;
        font-size: 0.875rem;
        margin-top: 0.5rem;
    }

    @media (max-width: 768px) {
        .registration-card {
            padding: 1.5rem;
        }

        .form-actions {
            flex-direction: column;
        }

        .form-actions .btn {
            width: 100%;
        }

        .page-header h1 {
            font-size: 1.8rem;
        }
    }
</style>
@endsection