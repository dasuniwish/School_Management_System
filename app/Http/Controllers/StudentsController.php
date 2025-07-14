<?php

namespace App\Http\Controllers;
use App\Models\Classes;
use App\Models\Students;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = DB::table('students')
        ->join('classes', 'students.class_numeric', '=', 'classes.class_numeric')
        ->select('students.*', 'classes.class_name as class_name') // Select subject fields and teacher name
        ->paginate(10);
    return view('Student.index', compact('students'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $lastStudent = Students::latest('id')->first();
    $student_id = $lastStudent ? 'S' . ($lastStudent->id + 1) : 'S1';

    $classes = Classes::all();

    return view('Student.create', compact('student_id', 'classes'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id'        => 'nullable|string|unique:students,student_id',
            'student_name'      => 'required|string|max:255',
            'gender'            => 'required|string',
            'phone'             => 'required|string|max:255',
            'dateofbirth'       => 'required',
            'class_numeric'          => 'required|exists:classes,class_numeric',
            'current_address'   => 'required|string|max:255',
            'permanent_address' => 'required|string|max:255',
            'mother_name'       => 'required|string|max:255',
            'mother_phone'      => 'required|string|max:255',
            'mother_address'    => 'required|string|max:255',
            'father_name'       => 'required|string|max:255',
            'father_phone'      => 'required|string|max:255',
            'father_address'    => 'required|string|max:255',
            'guardian_name'     => 'required|string|max:255',
            'guardian_phone'    => 'required|string|max:255',
            'guardian_address'  => 'required|string|max:255',
        ]);
        
        $data = $request->all();
        $data['dateofbirth'] = \Carbon\Carbon::createFromFormat('d/m/Y', $request->dateofbirth)->format('Y-m-d');
        $lastStudent = Students::latest('id')->first();
        $data['student_id'] = $lastStudent ? 'S' . ($lastStudent->id + 1) : 'S1';
        
        Students::create($data);

        return redirect()->route('students.index')->with('success', "Student added successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Students::findOrFail($id); // find student by ID or fail
        return view('Student.parent_details', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Students::findOrFail($id);
        $classes = Classes::all(); 
        $student->dateofbirth = \Carbon\Carbon::parse($student->dateofbirth)->format('d/m/Y'); 
        return view('Student.edit', compact('student', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $request->validate([
        'student_name'      => 'required|string|max:255',
        'gender'            => 'required|string',
        'phone'             => 'required|string|max:255',
        'dateofbirth'       => 'required',
        'class_numeric'     => 'required|exists:classes,class_numeric',
        'current_address'   => 'required|string|max:255',
        'permanent_address' => 'required|string|max:255',
        'mother_name'       => 'required|string|max:255',
        'mother_phone'      => 'required|string|max:255',
        'mother_address'    => 'required|string|max:255',
        'father_name'       => 'required|string|max:255',
        'father_phone'      => 'required|string|max:255',
        'father_address'    => 'required|string|max:255',
        'guardian_name'     => 'required|string|max:255',
        'guardian_phone'    => 'required|string|max:255',
        'guardian_address'  => 'required|string|max:255',
    ]);

    $student = Students::findOrFail($id);

    // Convert date format
    $formattedDate = \Carbon\Carbon::createFromFormat('d/m/Y', $request->dateofbirth)->format('Y-m-d');

    // Update fields
    $student->update([
        'student_name'      => $request->student_name,
        'gender'            => $request->gender,
        'phone'             => $request->phone,
        'dateofbirth'       => $formattedDate,
        'class_numeric'     => $request->class_numeric,
        'current_address'   => $request->current_address,
        'permanent_address' => $request->permanent_address,
        'mother_name'       => $request->mother_name,
        'mother_phone'      => $request->mother_phone,
        'mother_address'    => $request->mother_address,
        'father_name'       => $request->father_name,
        'father_phone'      => $request->father_phone,
        'father_address'    => $request->father_address,
        'guardian_name'     => $request->guardian_name,
        'guardian_phone'    => $request->guardian_phone,
        'guardian_address'  => $request->guardian_address,
    ]);

    return redirect()->route('students.index')->with('success', 'Student updated successfully!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Students::findOrFail($id); 
        $student->delete(); 

        return redirect()->route('students.index')->with('success', "Student deleted successfully");
    }
}
