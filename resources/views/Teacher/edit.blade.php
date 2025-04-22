@extends('Layout.app')

@section('content')
<style>
    .bg-darkgray {
        background-color: #0047b3; 
    }
</style>
<div class="d-flex align-items-center justify-content-between p-3 bg-darkgray rounded">
    <h3 class="mb-0">Edit Teacher</h3>
    <a href="{{ route('teachers.index') }}" class="btn btn-secondary d-flex align-items-center">
        <i class="bi bi-arrow-left"></i>&nbsp;Back
    </a>
</div>
<div class="d-flex justify-content-center align-items-center mt-3">
    <div class="p-4 bg-light rounded shadow" style="width: 700px;">
        <form action="{{ route('teachers.update', $teachers->id) }}" method="POST" class="w-100 px-4 py-4" enctype="multipart/form-data">
            @csrf
            @method('PUT') 
            <div class="mb-3 d-flex gap-3">
                <div class="w-25">
                    <label class="form-label text-dark fw-bold">Teacher ID</label>
                    <input name="teacher_id" class="form-control" type="text" value="{{ $teachers->teacher_id }}" readonly>
                    @error('teacher_id')
                        <p class="text-danger text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-75">
                    <label class="form-label text-dark fw-bold">Name</label>
                    <input name="name" class="form-control" type="text" value="{{ old('name', $teachers->name) }}">
                    @error('name')
                        <p class="text-danger text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-3 d-flex gap-3">
                <div class="w-25">
                    <label class="form-label text-dark fw-bold">Gender</label>
                    <select name="gender" class="form-control">
                        <option value="" disabled>Select Gender</option>
                        <option value="male" {{ (old('gender', $teachers->gender) == 'male') ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ (old('gender', $teachers->gender) == 'female') ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ (old('gender', $teachers->gender) == 'other') ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('gender')
                        <p class="text-danger text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-75">
                    <label class="form-label text-dark fw-bold">Email</label>
                    <input name="email" class="form-control" type="email" value="{{ old('email', $teachers->email) }}">
                    @error('email')
                        <p class="text-danger text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-3 d-flex gap-3">
                <div class="w-25">
                    <label class="form-label text-dark fw-bold">Date of Birth</label>
                    <input name="dateofbirth" class="form-control datepicker" id="datepicker-tc" autocomplete="off" type="text" value="{{ old('dateofbirth', $teachers->dateofbirth) }}">
                    @error('dateofbirth')
                        <p class="text-danger text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-75">
                    <label class="form-label text-dark fw-bold">Phone Number</label>
                    <input name="phone" class="form-control" type="text" value="{{ old('phone', $teachers->phone) }}">
                    @error('phone')
                        <p class="text-danger text-sm">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label text-dark fw-bold">Current Address</label>
                <input name="current_address" class="form-control" type="text" value="{{ old('current_address', $teachers->current_address) }}">
                @error('current_address')
                    <p class="text-danger text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label text-dark fw-bold">Permanent Address</label>
                <input name="permanent_address" class="form-control" type="text" value="{{ old('permanent_address', $teachers->permanent_address) }}">
                @error('permanent_address')
                    <p class="text-danger text-sm">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="btn btn-secondary w-100">Update</button>
        </form>
    </div>
</div>

@push('scripts')
<script>
    $(function() {       
        $( "#datepicker-tc" ).datepicker({ dateFormat: 'yy-mm-dd' });
    });
</script>
@endpush
@endsection
