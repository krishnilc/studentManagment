<?php

namespace App\Http\Controllers;

use App\Models\Student;
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
        $item = new Student();
        $item->name = 'Krishnil';
        $item->email = 'krishnil@gmail.com';
        $item->age = 24;
        $item->date_of_birth = '1999-01-01';
        $item->gender = 'male';
        $item->user_id = 2;
        $item->save();

        // DB::table('students')->insert([         
        //     [
        //         'name' => 'tester2',
        //         'email' => 'tester2@gmail.com',
        //         'age' => 22,
        //         'date_of_birth' => '2000-01-01',
        //         'gender' => 'female',
        //         'user_id' => 3,
        //     ],
        //     [
        //         'name' => 'tester3',
        //         'email' => 'tester3@gmail.com',
        //         'age' => 28,
        //         'date_of_birth' => '1995-01-01',
        //         'gender' => 'other',
        //         'user_id' => 4,
        //     ],
        //     [
        //         'name' => 'tester4',
        //         'email' => 'tester4@gmail.com',
        //         'age' => 30,
        //         'date_of_birth' => '1990-01-01',
        //         'gender' => 'male',
        //         'user_id' => 5,
        //     ],
        //        [
        //         'name' => 'tester5',
        //         'email' => 'tester5@gmail.com',
        //         'age' => 25,
        //         'date_of_birth' => '2010-01-01',
        //         'gender' => 'male',
        //         'user_id' => 6,
        //     ],
        // ]);

        return 'Data added successfully';
    }

    public function getData()
    {

            //$students = Student::all(); //to get all records
            // $students = Student::where('age', '>', 25)->get(); //to filter records  
            // $students = Student::select('name', 'email', 'age') //to select specific columns
            $students = Student::select('name', 'email', 'age')
            ->where('id', 2)
            ->get(); //to get all records that match the condition          
            return $students;

       // $students = DB::table('students')
       // ->count(); //to get count of records
        // ->limit(3) //->first to get single record, ->get to get all records, ->where to filter records
        // ->get();//        ->where('age', '>', 25)
        // ->where('age', '>', 26)
    //    ->select('name', 'email', 'age') //select specific columns  
    //     ->where('id', 2)
    //     // ->orWhere('age', '>', 26)
    //     ->get();
      //  return $students;

    }

    public function updateData()
    {
        $item = Student::find(9);//to find a record by id
        $item->name = 'updated name';
        $item->email = 'updated@email';
        $item->save();

        // DB::table('students')
        // ->where('id', 9)
        // ->update(['name' => 'updated name', 'email' => 'updated@email']);   
        return 'Data updated successfully'; 
    }

    public function deleteData()
    {
        $item = Student::findOrFail(20);//to find a record by id
        $item->delete();

        // DB::table('students')
        // ->where('id', 10)
        // ->delete();   
        return 'Data deleted successfully'; 
    }

    public function firstQuery()
    {
        $student = Student::male()->get(); //to get the first record
        return $student;
    }   

      public function secondQuery()
    {
        $student = Student::male()->get(); //to get the first record
        return $student;
    }   
}
