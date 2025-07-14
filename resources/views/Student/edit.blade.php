@extends('Layout.app')

@section('content')
<style>
    .bg-darkgray {
        background-color: #0047b3;
    }
</style>
<div class="d-flex align-items-center justify-content-between p-3 bg-darkgray rounded">
    <h3 class="mb-0">Edit Student</h3>
    <a href="{{ route('students.index') }}" class="btn btn-secondary d-flex align-items-center">
        <i class="bi bi-arrow-left"></i>&nbsp;Back
    </a>
</div>
<div class="d-flex justify-content-center align-items-center mt-3">
    <div class="p-4 bg-light rounded shadow" style="width: 700px;">
        <form action="{{ route('students.update', $student->id) }}" method="POST" class="w-100 px-4 py-4" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3 d-flex gap-3">
                <div class="w-25">
                    <label class="form-label text-dark fw-bold">Student ID</label>
                    <input name="student_id" class="form-control" type="text" value="{{ $student->student_id }}" readonly>
                </div>
                <div class="w-75">
                    <label class="form-label text-dark fw-bold">Name</label>
                    <input name="student_name" class="form-control" type="text" value="{{ old('student_name', $student->student_name) }}">
                </div>
            </div>
            <div class="mb-3 d-flex gap-3">
                <div class="w-25">
                    <label class="form-label text-dark fw-bold">Gender</label>
                    <select name="gender" class="form-control">
                        <option disabled>Select Gender</option>
                        <option value="male" {{ $student->gender == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ $student->gender == 'female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ $student->gender == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                </div>
                <div class="w-75">
                    <label class="form-label text-dark fw-bold">Phone Number</label>
                    <input name="phone" class="form-control" type="text" value="{{ old('phone', $student->phone) }}">
                </div>
            </div>
            <div class="mb-3 d-flex gap-3">
                <div class="w-50">
                    <label class="form-label text-dark fw-bold">Date of Birth</label>
                    <input name="dateofbirth" class="form-control datepicker" id="datepicker-tc" type="text" value="{{ old('dateofbirth', $student->dateofbirth) }}">
                </div>
                <div class="w-50">
                    <label class="form-label text-dark fw-bold">Class</label>
                    <select name="class_numeric" class="form-control">
                        <option value="">Select a Class</option>
                        @foreach($classes as $class)
                            <option value="{{ $class->class_numeric }}" {{ $student->class_numeric == $class->class_numeric ? 'selected' : '' }}>
                                {{ $class->class_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label text-dark fw-bold">Current Address</label>
                <input name="current_address" class="form-control" type="text" value="{{ old('current_address', $student->current_address) }}">
            </div>
            <div class="mb-3">
                <label class="form-label text-dark fw-bold">Permanent Address</label>
                <input name="permanent_address" class="form-control" type="text" value="{{ old('permanent_address', $student->permanent_address) }}">
            </div>
            <label class="form-label fw-bold" style="color: blue;">Mother Details</label>
            <div class="mb-3 d-flex gap-3">
                <div class="w-50">
                    <label class="form-label text-dark fw-bold">Name</label>
                    <input name="mother_name" class="form-control" type="text" value="{{ old('mother_name', $student->mother_name) }}">
                </div>
                <div class="w-50">
                    <label class="form-label text-dark fw-bold">Phone Number</label>
                    <input name="mother_phone" class="form-control" type="text" value="{{ old('mother_phone', $student->mother_phone) }}">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label text-dark fw-bold">Address</label>
                <input name="mother_address" class="form-control" type="text" value="{{ old('mother_address', $student->mother_address) }}">
            </div>
            <label class="form-label fw-bold" style="color: blue;">Father Details</label>
            <div class="mb-3 d-flex gap-3">
                <div class="w-50">
                    <label class="form-label text-dark fw-bold">Name</label>
                    <input name="father_name" class="form-control" type="text" value="{{ old('father_name', $student->father_name) }}">
                </div>
                <div class="w-50">
                    <label class="form-label text-dark fw-bold">Phone Number</label>
                    <input name="father_phone" class="form-control" type="text" value="{{ old('father_phone', $student->father_phone) }}">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label text-dark fw-bold">Address</label>
                <input name="father_address" class="form-control" type="text" value="{{ old('father_address', $student->father_address) }}">
            </div>
            <label class="form-label fw-bold" style="color: blue;">Guardian Details</label>
            <div class="mb-3 d-flex gap-3">
                <div class="w-50">
                    <label class="form-label text-dark fw-bold">Name</label>
                    <input name="guardian_name" class="form-control" type="text" value="{{ old('guardian_name', $student->guardian_name) }}">
                </div>
                <div class="w-50">
                    <label class="form-label text-dark fw-bold">Phone Number</label>
                    <input name="guardian_phone" class="form-control" type="text" value="{{ old('guardian_phone', $student->guardian_phone) }}">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label text-dark fw-bold">Address</label>
                <input name="guardian_address" class="form-control" type="text" value="{{ old('guardian_address', $student->guardian_address) }}">
            </div>
            <button type="submit" class="btn btn-primary w-100">Update</button>
        </form>
    </div>
</div>

@push('scripts')
<script>
    $(function() {
        $("#datepicker-tc").datepicker({ dateFormat: 'yy-mm-dd' });
    });
</script>
@endpush
@endsection
