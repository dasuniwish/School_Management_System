<?php

namespace App\Http\Controllers;
use App\Models\Teachers;
use App\Models\Students;
use App\Models\Classes;
use App\Models\Subjects;


use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index()
    {
        $totalTeachers = Teachers::count();
        $totalStudents = Students::count();
        $totalClasses = Classes::count();
        $totalSubjects = Subjects::count();
        return view('dashboard.index', compact('totalTeachers','totalStudents','totalClasses','totalSubjects'));
    }
}
