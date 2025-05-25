@extends('Layout.app')

@section('content')
<style>
    .bg-darkgray {
        background-color: #0047b3;
    }
    .detail-box {
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 20px;
        background-color: #f9f9f9;
    }
</style>
<div class="container">
    <div class="row justify-content-center mt-2">
        <div class="col-md-8 col-lg-6">
            <div class="border p-4 rounded shadow">
                <div class="bg-darkgray rounded p-1 mb-3 text-center">
                    <h2 class="text-black mb-0">{{ $student->student_name }}</h2>
                </div>

                <div class="detail-box">
                    <label class="form-label fw-bold" style="color: blue;">Mother Details</label>
                    <div class="row mb-2">
                        <div class="col-5 fw-bold">Name</div>
                        <div class="col-7">{{ $student->mother_name }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-5 fw-bold">Address</div>
                        <div class="col-7">{{ $student->mother_address }}</div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-5 fw-bold">Phone Number</div>
                        <div class="col-7">{{ $student->mother_phone }}</div>
                    </div>
                </div>

                <div class="detail-box">
                    <label class="form-label fw-bold" style="color: blue;">Father Details</label>
                    <div class="row mb-2">
                        <div class="col-5 fw-bold">Name</div>
                        <div class="col-7">{{ $student->father_name }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-5 fw-bold">Address</div>
                        <div class="col-7">{{ $student->father_address }}</div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-5 fw-bold">Phone Number</div>
                        <div class="col-7">{{ $student->father_phone }}</div>
                    </div>
                </div>

                <div class="detail-box">
                    <label class="form-label fw-bold" style="color: blue;">Guardian Details</label>
                    <div class="row mb-2">
                        <div class="col-5 fw-bold">Name</div>
                        <div class="col-7">{{ $student->guardian_name }}</div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-5 fw-bold">Address</div>
                        <div class="col-7">{{ $student->guardian_address }}</div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-5 fw-bold">Phone Number</div>
                        <div class="col-7">{{ $student->guardian_phone }}</div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
