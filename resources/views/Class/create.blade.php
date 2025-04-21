@extends('Layout.app')

@section('content')
<style>
    .bg-darkgray {
        background-color: #0047b3; /* Dark Gray */
    }
</style>
<div class="d-flex align-items-center justify-content-between p-3 bg-darkgray rounded">
    <h3 class="mb-0">Add New Class</h3>
    <a href="{{route('classes.index')}}" class="btn btn-secondary d-flex align-items-center">
    <i class="bi bi-arrow-left"></i>&nbsp;Back
    </a>
</div>
<div class="d-flex justify-content-center align-items-center mt-5">
    <div class="p-4 bg-light rounded shadow" style="width: 400px;">
        <form action="{{ route('classes.store') }}" method="POST" class="w-100 px-4 py-4" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label text-dark fw-bold">Class Name</label>
                <input name="class_name" class="form-control" type="text" value="{{ old('class_name') }}">
                @error('class_name')
                    <p class="text-danger text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label text-dark fw-bold">Class Numeric</label>
                <input name="class_numeric" class="form-control" type="text" value="{{ old('class_numeric') }}">
                @error('class_numeric')
                    <p class="text-danger text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label text-dark fw-bold">Assign Teacher</label>
                <select name="teacher_id" class="form-control">
                    <option value="">Select a Teacher</option>
                    @foreach($teachers as $teacher_id => $name)
                        <option value="{{ $teacher_id }}" {{ old('teacher_id') == $teacher_id ? 'selected' : '' }}>
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
                @error('teacher_id')
                    <p class="text-danger text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label text-dark fw-bold">Class Description</label>
                <textarea name="class_description" class="form-control" rows="2">{{ old('class_description') }}</textarea>
                @error('class_description')
                    <p class="text-danger text-sm">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-secondary w-100">Submit</button>
        </form>
    </div>
</div>
@endsection