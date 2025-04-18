<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Classes;
use App\Models\Subjects;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = DB::table('classes')
        ->join('teachers', 'classes.teacher_id', '=', 'teachers.teacher_id')
        ->select('classes.*', 'teachers.name as teacher_name') 
        ->get();
        return view('Class.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = DB::table('teachers')->pluck('name', 'teacher_id');
        return view('Class.create', compact('teachers'));
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'class_name' => 'required|string|unique:classes,class_name',
            'class_numeric' => 'required|numeric',
            'teacher_id' => 'required|exists:teachers,teacher_id',
            'class_description' => 'nullable|string',
        ]);

        Classes::create([
            'class_name' => $request->class_name,
            'class_numeric' => $request->class_numeric,
            'teacher_id' => $request->teacher_id,
            'class_description' =>  $request->class_description ?? '',
        ]);

        return redirect()->route('classes.index')->with('success', 'Class added successfully!');
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
        $classes = Classes::findOrFail($id); 
        $teachers = DB::table('teachers')->pluck('name', 'teacher_id'); 
    
        return view('Class.edit', compact('classes', 'teachers')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $class = Classes::findOrFail($id);

        $request->validate([
            'class_name' => 'required|string|unique:classes,class_name,' . $id ,
            'class_numeric' => 'required|numeric',
            'teacher_id' => 'required|exists:teachers,teacher_id',
            'class_description' => 'nullable|string',
        ]);
    
        $class->update([
            'class_name' => $request->class_name,
            'class_numeric' => $request->class_numeric,
            'teacher_id' => $request->teacher_id,
            'class_description' => $request->class_description ?? '',
        ]);
    
        return redirect()->route('classes.index')->with('success', 'Class updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $class = Classes::findOrFail($id); 
        $class->delete(); 

        return redirect()->route('classes.index')->with('success', "Class deleted successfully");
    }
    
    public function assignSubjects($id)
    {
        $class = Classes::findOrFail($id);
        $subjects = Subjects::all();
        $assigned = $class->subjects->pluck('id')->toArray();

        return view('Class.assign_subjects', compact('class', 'subjects', 'assigned'));
    }

    public function storeAssignedSubjects(Request $request, $classId)
    {
        $class = Classes::findOrFail($classId);
        $validated = $request->validate([
            'subjects' => 'array',
            'subjects.*' => 'exists:subjects,id',
        ]);

        $class->subjects()->sync($validated['subjects']);

        return redirect()->route('classes.index')->with('success', 'Subjects assigned successfully!');
    }

}
