@extends('layouts.app')

@section('title', 'About Us - Student Managements')

@section('page-title', 'About Us')

@section('page-description', 'Learn more about our student management system and mission')

@section('content')
    <h2 style="color: #667eea; margin-bottom: 1.5rem; font-size: 1.5rem;">Our Mission</h2>
    <p style="margin-bottom: 1rem; text-align: justify;">
        Welcome to our student management system! We are dedicated to providing a comprehensive platform
        for managing student information, grades, and communication. Our mission is to streamline the administrative
        tasks associated with student management while fostering a supportive and engaging learning environment.
    </p>
    <p style="margin-bottom: 1rem; text-align: justify;">
        Our team is passionate about education and technology, and we strive to create a user-friendly experience 
        for both educators and students. We believe in the power of education to transform lives, and we are committed 
        to supporting the success of every student through our innovative solutions.
    </p>
    <p style="margin-bottom: 2rem; text-align: justify;">
        Thank you for choosing our student management system. We look forward to working with you and helping you achieve
        your educational goals!
    </p>

    <hr style="margin: 2rem 0; border: 1px solid #ecf0f1;">

    <h2 style="color: #667eea; margin-bottom: 1.5rem; font-size: 1.5rem;">Contact Information</h2>
    <p style="margin-bottom: 1rem;">If you have any questions or would like to learn more about our services, please feel free to reach out to us:</p>
    
    <div style="background-color: #f9f9f9; padding: 1.5rem; border-radius: 6px; margin-bottom: 2rem; border-left: 4px solid #667eea;">
        <ul style="list-style: none; padding: 0;">
            <li style="margin-bottom: 0.5rem;"><strong>Name:</strong> {{ $name ?? 'Contact Name' }}</li>
            <li><strong>Email:</strong> {{ $email ?? 'contact@example.com' }}</li>
        </ul>
    </div>

    @include('SubViews.input', ['myName' => $name ?? 'User'])

    <h3 style="color: #667eea; margin-top: 2rem; margin-bottom: 1rem;">Loop Example</h3>
    <div style="display: grid; gap: 0.5rem;">
        @for ($i = 0; $i < 5; $i++)
            <div style="padding: 0.75rem; background-color: {{ $i % 2 == 0 ? '#e8f4f8' : '#f0e8f8' }}; border-left: 4px solid {{ $i % 2 == 0 ? '#667eea' : '#764ba2' }}; border-radius: 4px;">
                Loop iteration {{ $i }}
                @if ($i % 2 == 0)
                    <span style="color: #667eea; font-weight: bold;">({{ $i }} is an even number)</span>
                @endif
            </div>
        @endfor
    </div>
@endsection