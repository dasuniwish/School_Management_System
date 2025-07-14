@extends('Layout.app')

@section('content')
<div class="container pt-5" style="margin-top: 60px;">
    <div class="row justify-content-center mb-4">

        <!-- Students Card -->
        <div class="col-md-3 mx-3">
            <a href="{{ route('students.index') }}" style="text-decoration: none; color: inherit;">
                <div class="card dashboard-card">
                    <div class="card-header d-flex align-items-center justify-content-center"
                         style="background-color: #001a33; 
                                color: white; 
                                font-weight: bold; 
                                font-size: 25px;
                                border-top-left-radius: 15px;
                                border-top-right-radius: 15px;
                                opacity: 0.9;">
                        Students
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-center"
                         style="background-color: #f0f0f0; opacity: 0.95;">
                        <h5 class="card-title m-0" style="font-size: 60px;">{{ $totalStudents }}</h5>
                    </div>
                </div>
            </a>
        </div>

        <!-- Classes Card -->
        <div class="col-md-3 mx-3">
            <a href="{{ route('classes.index') }}" style="text-decoration: none; color: inherit;">
                <div class="card dashboard-card">
                    <div class="card-header d-flex align-items-center justify-content-center"
                         style="background-color: #001a33; 
                                color: white; 
                                font-weight: bold; 
                                font-size: 25px;
                                border-top-left-radius: 15px;
                                border-top-right-radius: 15px;
                                opacity: 0.9;">
                        Classes
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-center"
                         style="background-color: #f0f0f0; opacity: 0.95;">
                        <h5 class="card-title m-0" style="font-size: 60px;">{{ $totalClasses }}</h5>
                    </div>
                </div>
            </a>
        </div>

        <!-- Subjects Card -->
        <div class="col-md-3 mx-3">
            <a href="{{ route('subjects.index') }}" style="text-decoration: none; color: inherit;">
                <div class="card dashboard-card">
                    <div class="card-header d-flex align-items-center justify-content-center"
                         style="background-color: #001a33; 
                                color: white; 
                                font-weight: bold; 
                                font-size: 25px;
                                border-top-left-radius: 15px;
                                border-top-right-radius: 15px;
                                opacity: 0.9;">
                        Subjects
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-center"
                         style="background-color: #f0f0f0; opacity: 0.95;">
                        <h5 class="card-title m-0" style="font-size: 60px;">{{ $totalSubjects }}</h5>
                    </div>
                </div>
            </a>
        </div>

    </div>
</div>

{{-- Hover Animation Styles --}}
<style>
    .dashboard-card {
        border-radius: 15px;
        overflow: hidden;
        height: 200px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease-in-out;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.25);
    }
</style>
@endsection
