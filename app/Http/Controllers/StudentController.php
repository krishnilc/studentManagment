<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        return 'Hello from StudentController';
    }

    public function aboutUs()
    {
        return 'This is the about us page from StudentController';
    }

    // Add data to students table using query builder
    public function addData()
    {
        DB::table('students')->insert([         
            [
                'name' => 'tester2',
                'email' => 'tester2@gmail.com',
                'age' => 22,
                'date_of_birth' => '2000-01-01',
                'gender' => 'female',
                'user_id' => 3,
            ],
            [
                'name' => 'tester3',
                'email' => 'tester3@gmail.com',
                'age' => 28,
                'date_of_birth' => '1995-01-01',
                'gender' => 'other',
                'user_id' => 4,
            ],
            [
                'name' => 'tester4',
                'email' => 'tester4@gmail.com',
                'age' => 30,
                'date_of_birth' => '1990-01-01',
                'gender' => 'male',
                'user_id' => 5,
            ],
               [
                'name' => 'tester5',
                'email' => 'tester5@gmail.com',
                'age' => 25,
                'date_of_birth' => '2010-01-01',
                'gender' => 'male',
                'user_id' => 6,
            ],
        ]);

        return 'Data added successfully';
    }

    public function getData()
    {
        $students = DB::table('students')
        ->count(); //to get count of records
        // ->limit(3) //->first to get single record, ->get to get all records, ->where to filter records
        // ->get();//        ->where('age', '>', 25)
        // ->where('age', '>', 26)
    //    ->select('name', 'email', 'age') //select specific columns  
    //     ->where('id', 2)
    //     // ->orWhere('age', '>', 26)
    //     ->get();
        return $students;

    }

    public function updateData()
    {
        DB::table('students')
        ->where('id', 9)
        ->update(['name' => 'updated name', 'email' => 'updated@email']);   
        return 'Data updated successfully'; 
    }

    public function deleteData()
    {
        DB::table('students')
        ->where('id', 10)
        ->delete();   
        return 'Data deleted successfully'; 
    }
}
