@extends('layouts.app')

@section('title', 'Contact Us - Student Management')

@section('page-title', 'Contact Us')

@section('page-description', 'Get in touch with our team - we are here to help')

@section('content')
    <p style="margin-bottom: 1.5rem; font-size: 1.05rem;">
        If you have any questions or inquiries, please feel free to contact us at:
    </p>

    <div style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); padding: 2rem; border-radius: 8px; color: white; margin-bottom: 2rem;">
        <div style="display: grid; gap: 1rem;">
            <div>
                <p style="opacity: 0.9; margin-bottom: 0.3rem; font-size: 0.95rem;">Email Address</p>
                <p style="font-size: 1.2rem; font-weight: bold;">{{ $email ?? 'contact@example.com' }}</p>
            </div>
            <div>
                <p style="opacity: 0.9; margin-bottom: 0.3rem; font-size: 0.95rem;">Contact Person</p>
                <p style="font-size: 1.2rem; font-weight: bold;">{{ $name ?? 'Contact Name' }}</p>
            </div>
        </div>
    </div>

    <p style="margin-bottom: 1.5rem; text-align: justify; line-height: 1.8;">
        We are here to assist you and provide any information you may need. Our dedicated team is committed to 
        responding to your inquiries promptly and professionally. Don't hesitate to reach out to us, and we will 
        get back to you as soon as possible. Thank you for your interest in our student management system!
    </p>

    <hr style="margin: 2rem 0; border: 1px solid #ecf0f1;">

    <h2 style="color: #667eea; margin: 2rem 0 1.5rem 0; font-size: 1.3rem;">Send us a Message</h2>

    @include('SubViews.input', ['myName' => $name ?? 'User'])
@endsection