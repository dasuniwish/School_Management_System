@extends('Layout.app')

@section('content')
<style>
    .bg-darkgray {
        background-color: #0047b3; 
    }
</style>
<div class="d-flex align-items-center justify-content-between p-3 bg-darkgray rounded">
    <h3 class="mb-0">Edit User & Assign Role</h3>
    <a href="{{ route('roles.index') }}" class="btn btn-secondary d-flex align-items-center">
        <i class="bi bi-arrow-left"></i>&nbsp;Back
    </a>
</div>
<div class="d-flex justify-content-center align-items-center mt-3">
    <div class="p-4 bg-light rounded shadow" style="width: 500px;">
        <form action="{{ route('roles.update', $user->id) }}" method="POST" class="w-100 px-4 py-4" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label class="form-label text-dark fw-bold">Name</label>
                <input name="name" class="form-control" type="text" value="{{ old('name', $user->name) }}" >
                @error('name')
                    <p class="text-danger text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label text-dark fw-bold">Email</label>
                <input name="email" class="form-control" type="text" value="{{ old('email', $user->email) }}" >
                @error('email')
                    <p class="text-danger text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label text-dark fw-bold">Role</label>
                <select name="role" class="form-control">
                    <option value="" disabled>Select Role</option>
                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="teacher" {{ old('role', $user->role) == 'teacher' ? 'selected' : '' }}>Teacher</option>
                    <option value="student" {{ old('role', $user->role) == 'student' ? 'selected' : '' }}>Student</option>
                </select>
                @error('role')
                    <p class="text-danger text-sm">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label text-dark fw-bold">Password <small class="text-muted">(Leave blank to keep current password)</small></label>
                <div class="input-group">
                    <input type="password" name="password" id="password" class="form-control"
                        minlength="8" maxlength="20"
                        pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&]).{8,20}$"
                    >
                    <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                        <i class="bi bi-eye-slash"></i>
                    </button>
                </div>
                <small class="text-warning">8-20 chars, at least one letter, number, and special char.</small>
                @error('password')
                    <p class="text-danger text-sm">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-secondary w-100">Update</button>
            <div class="text-center mt-3">
                <a href="{{ route('roles.index') }}" class="text-black">View All Users</a>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById("togglePassword").addEventListener("click", function () {
        const password = document.getElementById("password");
        const icon = this.querySelector("i");
        if (password.type === "password") {
            password.type = "text";
            icon.classList.replace("bi-eye-slash", "bi-eye");
        } else {
            password.type = "password";
            icon.classList.replace("bi-eye", "bi-eye-slash");
        }
    });
</script>
@endsection
