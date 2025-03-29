@extends('Layout.app')

@section('content')
<style>
    .bg-darkgray {
        background-color: #c9d1cf; /* Dark Gray */
    }
</style>
<div class="d-flex align-items-center justify-content-between p-3 bg-darkgray rounded">
    <h3 class="mb-0">Add New Teachers</h3>
    <a href="{{route('teachers.index')}}" class="btn btn-secondary d-flex align-items-center">
    <i class="bi bi-arrow-left"></i>&nbsp;Back
    </a>
</div>
<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="p-4 bg-light rounded shadow" style="width: 400px;">
        <form action="{{ route('teachers.store') }}" method="POST" class="w-100 px-4 py-4" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label text-dark fw-bold">Teacher ID</label>
                <input name="user_id" class="form-control" type="text" value="{{ old('user_id', $user_id ?? '') }}" readonly>
                @error('user_id')
                    <p class="text-danger text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label text-dark fw-bold">Name</label>
                <input name="name" class="form-control" type="text" value="{{ old('name') }}">
                @error('name')
                    <p class="text-danger text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label text-dark fw-bold">Email</label>
                <input name="email" class="form-control" type="email" value="{{ old('email') }}">
                @error('email')
                    <p class="text-danger text-sm">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="mb-3">
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
            <div class="mb-3">
                <label class="form-label text-dark fw-bold">Phone Number</label>
                <input name="phone" class="form-control" type="text" value="{{ old('phone') }}">
                @error('phone')
                    <p class="text-danger text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label text-dark fw-bold">Date of Birth</label>
                <input name="dateofbirth" class="form-control datepicker" id="datepicker-tc" autocomplete="off" type="text" >
                @error('dateofbirth')
                    <p class="text-danger text-sm">{{ $message }}</p>
                @enderror
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