<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SecondTestController;
use App\Http\Controllers\TeacherController;
use App\Models\Teacher;


Route::get('/home', function () {
    return view('home');
});

Route::get('/about', function () {
    return '<h1>About Us</h1><p>This is the about page.</p>';
});

Route::fallback(function () {
    return view('errors.404');
});

// Route::get('/about-us', function () {
//     $name = "John Doe";
//     $email = "john@gmail.com";
//   //  return view('aboutus', compact('name', 'email'));
//    // return view('aboutus')->with('name', $name)->with('email', $email);
//    return view('aboutus', ['name' => $name, 'email' => $email]);
// });

Route::get('/about-us/{name}/{email}', function ($name, $email) {
    return view('aboutus', compact('name', 'email'));
});

// Route::view('contact-us', 'contactus');

Route::get('contact-us/{name}/{email}', function ($name, $email) {
    return view('contactus', compact('name', 'email'));
});

// Route::get('students', [StudentController::class, 'index'] );

// Route::controller(StudentController::class)->group(function () {
//     Route::get('students', 'index');
//     Route::get('about-us', 'aboutUs');
// });

Route::resource('second-test', SecondTestController::class);

// route::get('teachers', function () {
//     return Teacher::all();
//    // return view('teachers.index', compact('teachers'));
// });

Route::get('teachers', [TeacherController::class, 'index']);
Route::get('teachers/add', [TeacherController::class, 'add']);
Route::get('teachers/show/{id}', [TeacherController::class, 'show']);
Route::get('teachers/update/{id}', [TeacherController::class, 'update']);
Route::get('teachers/delete/{id}', [TeacherController::class, 'delete']);
// route::get('students/add', [StudentController::class, 'addData']);
// route::get('students/get', [StudentController::class, 'getData']);
// route::get('students/update', [StudentController::class, 'updateData']);
// route::get('students/delete', [StudentController::class, 'deleteData']);
route::get('query1', [StudentController::class, 'firstQuery']);

route::prefix('student')->controller(StudentController::class)->group(function () {
    route::get('/', 'index');  
});