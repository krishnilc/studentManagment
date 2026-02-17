<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentAddRequest;
use App\Models\Student;
use App\Models\Countries;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::when($request->search, function ($query) use ($request) {
            return $query->whereAny([
                'name',
                'email',
                'age',
                'date_of_birth',
                'gender',
            ], 'like', '%' . $request->search . '%');
        })->paginate(10);
        return view('students.index', compact('students'));
    }

    public function aboutUs()
    {
        return 'This is the about us page from StudentController';
    }

    /**
     * Show the form for creating a new student.
     */
    public function create()
    {
        $countries = Countries::all();
        return view('students.add', compact('countries'));
    }

    /**
     * Store a newly created student in database.
     */
    public function store(StudentAddRequest $request)
    {
        // $student = new Student;
        // $student->name = $request->name;
        // $student->email = $request->email;
        // $student->date_of_birth = $request->date_of_birth;
        // $student->gender = $request->gender;
        // $student->age = $request->age;
        // $student->user_id = $request->user_id;
        // $student->save();   
        // return redirect('student');

       
        try {
            $data = $request->validated();
            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('student_images', 'public');
            }

            Student::create($data); // Mass assignment using the validated data from the form request
            return redirect()->route('students.index')->with('success', 'Student registered successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to register student. Please try again. Error: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Show the form for editing the specified student.
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $countries = Countries::all();
        return view('students.edit', compact('student', 'countries'));
    }

    /**
     * Update the specified student in storage.
     */
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students,email,' . $student->id,
            'date_of_birth' => 'required|date|before:today',
            'gender' => 'required|in:male,female,other',
            'age' => 'required|integer|min:5|max:120',
            'user_id' => 'required|integer|exists:users,id',
        ]);

        try {
            $student->update($validated);
            return redirect()->route('students.index')->with('success', 'Student updated successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update student. Error: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified student from storage (soft delete).
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        try {
            $student->delete();
            return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete student. Error: ' . $e->getMessage());
        }
    }

    /**
     * Show all soft-deleted (trashed) students.
     */
    public function trash()
    {
        $students = Student::onlyTrashed()->paginate(10);
        return view('students.trash', compact('students'));
    }

    /**
     * Restore a soft-deleted student.
     */
    public function restore($id)
    {
        $student = Student::withTrashed()->findOrFail($id);

        try {
            $student->restore();
            return redirect()->route('students.index')->with('success', 'Student restored successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to restore student. Error: ' . $e->getMessage());
        }
    }

    // Add data to students table using query builder
    public function addData()
    {
        $item = new Student;
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

        //    $students = Student::all(); //to get all records
        $students = Student::onlyTrashed()->get(); // to get only soft deleted records

        // $students = Student::withTrashed()->get(); //to get all records including soft deleted records
        // $students = Student::where('age', '>', 25)->get(); //to filter records
        // $students = Student::select('name', 'email', 'age') //to select specific columns
        // $students = Student::select('name', 'email', 'age')
        // ->where('id', 2)
        // ->get(); //to get all records that match the condition
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
        $item = Student::find(9); // to find a record by id
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
        $item = Student::findOrFail(1); // to find a record by id
        $item->delete();

        // DB::table('students')
        // ->where('id', 10)
        // ->delete();
        return 'Data deleted successfully';
    }

    public function firstQuery()
    {
        $student = Student::male()->get(); // to get the first record

        return $student;
    }

    public function secondQuery()
    {
        $student = Student::male()->get(); // to get the first record

        return $student;
    }
}
