<?php

namespace App\Http\Controllers;
use App\Models\Classes;
use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Student.index');

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
            'class_id'          => 'required|exists:classes,id',
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
