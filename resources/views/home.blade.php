@extends('Layout.app')

@section('content')
<style>
    .dashboard-box {
        border: 1px solid #ddd;
        border-radius: 10px;
        padding: 30px;
        background-color: #f1f5f9;
        text-align: center;
        margin-top: 50px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .dashboard-number {
        font-size: 48px;
        font-weight: bold;
        color: #0047b3;
    }
    .dashboard-label {
        font-size: 18px;
        font-weight: 500;
        margin-top: 10px;
        color: #333;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="dashboard-box">
                <div class="dashboard-number">
                    {{ $studentCount }}
                </div>
                <div class="dashboard-label">
                    Total Students
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
