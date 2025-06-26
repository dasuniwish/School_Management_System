@extends('Layout.app') <!-- Adjust this to match your layout -->

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Registered Users</h3>
        <a href="{{ route('roles.create') }}" class="btn btn-primary">+ Add New User</a>
    </div>

    <table class="table table-bordered shadow">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ ucfirst($user->role) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">No users registered yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
