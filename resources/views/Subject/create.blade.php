@extends('Layout.app')

@section('content')
<style>
    .bg-darkgray {
        background-color: #0047b3; /* Dark Gray */
    }
</style>
<div class="d-flex align-items-center justify-content-between p-3 bg-darkgray rounded">
    <h3 class="mb-0">Add New Subject</h3>
    <a href="{{route('subjects.index')}}" class="btn btn-secondary d-flex align-items-center">
    <i class="bi bi-arrow-left"></i>&nbsp;Back
    </a>
</div>
<div class="d-flex justify-content-center align-items-center mt-5">
    <div class="p-4 bg-light rounded shadow" style="width: 400px;">
        <form action="{{ route('subjects.store') }}" method="POST" class="w-100 px-4 py-4" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label text-dark fw-bold">Subject Code</label>
                <input name="subject_code" class="form-control" type="text" value="{{ old('subject_code') }}">
                @error('subject_code')
                    <p class="text-danger text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label text-dark fw-bold"> Subject Name</label>
                <input name="subject_name" class="form-control" type="text" value="{{ old('subject_name') }}">
                @error('subject_name')
                    <p class="text-danger text-sm">{{ $message }}</p>
                @enderror
            </div>
             <div class="mb-3">
                <label class="form-label text-dark fw-bold"> Description</label>
                <textarea name="description" class="form-control" rows="2">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-danger text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label text-dark fw-bold">Teacher</label>
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

           
            <button type="submit" class="btn btn-secondary w-100">Submit</button>
        </form>
    </div>
</div>
@endsection