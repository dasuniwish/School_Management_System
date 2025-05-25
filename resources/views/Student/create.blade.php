@extends('Layout.app')

@section('content')
<style>
    .bg-darkgray {
        background-color: #0047b3; 
    }
</style>
<div class="d-flex align-items-center justify-content-between p-3 bg-darkgray rounded">
    <h3 class="mb-0">Add New Student</h3>
    <a href="{{route('students.index')}}" class="btn btn-secondary d-flex align-items-center">
    <i class="bi bi-arrow-left"></i>&nbsp;Back
    </a>
</div>
<div class="d-flex justify-content-center align-items-center mt-3">
    <div class="p-4 bg-light rounded shadow" style="width: 700px;">
        <form action="{{ route('students.store') }}" method="POST" class="w-100 px-4 py-4" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 d-flex gap-3">
                <div class="w-25">
                    <label class="form-label text-dark fw-bold">Student ID</label>
                    <input name="student_id" class="form-control" type="text" value="{{ old('student_id', $student_id ?? '') }}" readonly>
                    @error('student_id')
                        <p class="text-danger text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-75">
                    <label class="form-label text-dark fw-bold">Name</label>
                    <input name="student_name" class="form-control" type="text" value="{{ old('student_name') }}">
                    @error('student_name')
                        <p class="text-danger text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-3 d-flex gap-3">
                <div class="w-25">
                    <label class="form-label text-dark fw-bold">Gender</label>
                    <select name="gender" class="form-control">
                        <option value="" selected disabled>Select Gender</option>
                        <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('gender')
                        <p class="text-danger text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-75">
                    <label class="form-label text-dark fw-bold">Phone Number</label>
                    <input name="phone" class="form-control" type="text" value="{{ old('phone') }}">
                    @error('phone')
                        <p class="text-danger text-sm">{{ $message }}</p>
                    @enderror
                </div> 
            </div> 
            <div class="mb-3 d-flex gap-3">
                <div class="w-50">
                    <label class="form-label text-dark fw-bold">Date of Birth</label>
                    <input name="dateofbirth" class="form-control datepicker" id="datepicker-tc" autocomplete="off" type="text" >
                    @error('dateofbirth')
                        <p class="text-danger text-sm">{{ $message }}</p>
                    @enderror
                </div> 
                <div class="w-50">
                    <label class="form-label text-dark fw-bold">Class</label>
                    <select name="class_numeric" class="form-control">
                        <option value="">Select a Class</option>
                        @foreach($classes as $class)
                            <option value="{{ $class->class_numeric }}" {{ old('class_numeric') == $class->class_numeric ? 'selected' : '' }}>
                                {{ $class->class_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('class_id')
                        <p class="text-danger text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label text-dark fw-bold">Current Address</label>
                <input name="current_address" class="form-control" type="text" value="{{ old('current_address') }}">
                @error('current_address')
                    <p class="text-danger text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label text-dark fw-bold">Permanent Address</label>
                <input name="permanent_address" class="form-control" type="text" value="{{ old('permanent_address') }}">
                @error('permanent_address')
                    <p class="text-danger text-sm">{{ $message }}</p>
                @enderror
            </div>
            <label class="form-label fw-bold" style="color: blue;">Mother Details</label>
            <div class="mb-3 d-flex gap-3">
                <div class="w-50">
                    <label class="form-label text-dark fw-bold">Name</label>
                    <input name="mother_name" class="form-control" type="text" value="{{ old('mother_name') }}">
                    @error('mother_name')
                        <p class="text-danger text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-50">
                    <label class="form-label text-dark fw-bold">Phone Number</label>
                    <input name="mother_phone" class="form-control" type="text" value="{{ old('mother_phone') }}">
                    @error('mother_phone')
                        <p class="text-danger text-sm">{{ $message }}</p>
                    @enderror
                </div> 
            </div>
            <div class="mb-3">
                <label class="form-label text-dark fw-bold">Address</label>
                <input name="mother_address" class="form-control" type="text" value="{{ old('mother_address') }}">
                @error('mother_address')
                    <p class="text-danger text-sm">{{ $message }}</p>
                @enderror
            </div>
            <label class="form-label fw-bold" style="color: blue;">Father Details</label>
            <div class="mb-3 d-flex gap-3">
                <div class="w-50">
                    <label class="form-label text-dark fw-bold">Name</label>
                    <input name="father_name" class="form-control" type="text" value="{{ old('father_name') }}">
                    @error('father_name')
                        <p class="text-danger text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-50">
                    <label class="form-label text-dark fw-bold">Phone Number</label>
                    <input name="father_phone" class="form-control" type="text" value="{{ old('father_phone') }}">
                    @error('father_phone')
                        <p class="text-danger text-sm">{{ $message }}</p>
                    @enderror
                </div> 
            </div>
            <div class="mb-3">
                <label class="form-label text-dark fw-bold">Address</label>
                <input name="father_address" class="form-control" type="text" value="{{ old('father_address') }}">
                @error('father_address')
                    <p class="text-danger text-sm">{{ $message }}</p>
                @enderror
            </div>
            <label class="form-label fw-bold" style="color: blue;">Guardian Details</label>
            <div class="mb-3 d-flex gap-3">
                <div class="w-50">
                    <label class="form-label text-dark fw-bold">Name</label>
                    <input name="guardian_name" class="form-control" type="text" value="{{ old('guardian_name') }}">
                    @error('guardian_name')
                        <p class="text-danger text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-50">
                    <label class="form-label text-dark fw-bold">Phone Number</label>
                    <input name="guardian_phone" class="form-control" type="text" value="{{ old('guardian_phone') }}">
                    @error('guardian_phone')
                        <p class="text-danger text-sm">{{ $message }}</p>
                    @enderror
                </div> 
            </div>
            <div class="mb-3">
                <label class="form-label text-dark fw-bold">Address</label>
                <input name="guardian_address" class="form-control" type="text" value="{{ old('guardian_address') }}">
                @error('guardian_address')
                    <p class="text-danger text-sm">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-secondary w-100">Submit</button>
        </form>
    </div>
</div>
@push('scripts')
<script>
    $(function() {       
        $( "#datepicker-tc" ).datepicker({ dateFormat: 'yy-mm-dd' });
    })
</script>
@endpush
@endsection