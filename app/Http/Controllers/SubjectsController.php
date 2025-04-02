<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Subjects;
use App\Models\Teacher;


class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subjects::all(); 
        return view('Subject.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = DB::table('teachers')->pluck('name', 'teacher_id');
        return view('Subject.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject_code' => 'required|unique:subjects,subject_code',
            'subject_name' => 'required',
            'teacher_id' => 'required|exists:teachers,teacher_id',
            'description' => 'nullable|string',

        ]);

        Subjects::create([
            'subject_code' => $request->subject_code,
            'subject_name' => $request->subject_name,
            'teacher_id' => $request->teacher_id,
            'description' => $request->description ?? '', // Set empty string if null
        ]);
        
        return redirect()->route('subjects.index')->with('success', 'Subject added successfully');
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
