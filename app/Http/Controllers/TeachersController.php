<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Teachers;




class TeachersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teachers::with('subjects')->get(); 
        return view('Teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lastTeacher = Teachers::latest('id')->first();
        $teacher_id = $lastTeacher ? 'T' . ($lastTeacher->id + 1) : 'T1';
        return view('Teacher.create', compact('teacher_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'email'             => 'required|string|email|max:255|unique:teachers',
            'gender'            => 'required|string',
            'phone'             => 'required|string|max:255',
            'dateofbirth'       => 'required',
            'current_address'   => 'required|string|max:255',
            'permanent_address' => 'required|string|max:255',
            'teacher_id' => 'nullable|string|unique:teachers,teacher_id',
        ]);
        
        $data = $request->all();
        $data['dateofbirth'] = \Carbon\Carbon::createFromFormat('d/m/Y', $request->dateofbirth)->format('Y-m-d');
        $lastTeacher = Teachers::latest('id')->first();
        $data['teacher_id'] = $lastTeacher ? 'T' . ($lastTeacher->id + 1) : 'T1';
        
        Teachers::create($data);

        return redirect()->route('teachers.index')->with('success', "Teacher added successfully");
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
        $teachers = Teachers::findOrFail($id); 
        $teachers->dateofbirth = \Carbon\Carbon::parse($teachers->dateofbirth)->format('d/m/Y'); 
        return view('Teacher.edit', compact('teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'              => 'required|string|max:255',
            'email'             => 'required|string|email|max:255|unique:teachers,email,' . $id,
            'gender'            => 'required|string',
            'phone'             => 'required|string|max:255',
            'dateofbirth'       => 'required', 
            'current_address'   => 'required|string|max:255',
            'permanent_address' => 'required|string|max:255',
        ]);

        $teacher = Teachers::findOrFail($id); 
        $data = $request->all();
        $data['dateofbirth'] = \Carbon\Carbon::createFromFormat('d/m/Y', $request->dateofbirth)->format('Y-m-d');
        $teacher->update($data); 

        return redirect()->route('teachers.index')->with('success', "Teacher updated successfully");
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher = Teachers::findOrFail($id); 
        $teacher->delete(); 

        return redirect()->route('teachers.index')->with('success', "Teacher deleted successfully");
    }
}
