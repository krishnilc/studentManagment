@extends('layouts.app')

@section('title', 'Index Student Management')

@section('page-title', 'Index')

@section('page-description', 'Get in touch with our team - we are here to help')

@section('content')
        

<p style="margin-bottom: 1.5rem; font-size: 1.05rem;">
        If you have any questions or inquiries, please feel free to contact us at:
    </p>

 
   

    @include('SubViews.input', ['myName' => $name ?? 'User'])
@endsection