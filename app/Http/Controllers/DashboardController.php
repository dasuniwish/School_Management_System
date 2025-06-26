<?php

namespace App\Http\Controllers;
use App\Models\Teachers;
use App\Models\Students;
use App\Models\Classes;
use App\Models\Subjects;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function index()
    {
         $user = Auth::user();

        if ($user->role === 'admin') {
            $totalTeachers = Teachers::count();
            $totalStudents = Students::count();
            $totalClasses = Classes::count();
            $totalSubjects = Subjects::count();

            return view('dashboard.admin', compact('totalTeachers', 'totalStudents', 'totalClasses', 'totalSubjects'));
        } elseif ($user->role === 'teacher') {
             $totalTeachers = Teachers::count();
            $totalStudents = Students::count();
            $totalClasses = Classes::count();
            $totalSubjects = Subjects::count();
            return view('dashboard.teacher', compact('totalTeachers', 'totalStudents', 'totalClasses', 'totalSubjects'));
        }elseif ($user->role === 'student') {
             $totalTeachers = Teachers::count();
            $totalStudents = Students::count();
            $totalClasses = Classes::count();
            $totalSubjects = Subjects::count();
            return view('dashboard.student', compact('totalTeachers', 'totalStudents', 'totalClasses', 'totalSubjects'));
        }

        abort(403, 'Unauthorized access.');
    }
}
