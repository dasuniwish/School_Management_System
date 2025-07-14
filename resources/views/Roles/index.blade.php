@extends('Layout.app')

@section('content')
    <style>
    .bg-darkgray {
        background-color: #0047b3; 
    }
</style>
<div class="d-flex align-items-center justify-content-between p-3 bg-darkgray rounded">
    <h3 class="mb-0">Assign Role</h3>
    <a href="{{route('roles.create')}}" class="btn btn-secondary d-flex align-items-center">
        + Add New User
    </a>
</div>
<br/>


@if(Session::has('success'))
<div class="alert alert-success" id="success-message" role="alert">
    {{ Session::get('success') }}
</div>

<script>
    setTimeout(function() {
        document.getElementById('success-message').style.display = 'none';
    }, 3000);
</script>
@endif

    <table class="table table-bordered shadow">
        <thead class="table-dark">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ ucfirst($user->role) }}</td>
                 <td>
                            <a href="{{ route('roles.edit', $user->id) }}" class="btn btn-light btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>
                            &nbsp;
                            <form id="delete-form-{{ $user->id }}" action="{{ route('roles.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-light btn-sm delete-btn" data-id="{{ $user->id }}">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>

                        </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">No users registered yet.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4 d-flex justify-content-center">
    <style>
        /* Make all pagination text black */
        .pagination li a, .pagination li span {
            color: #000 !important;
        }
        /* Make the active page background black and text white */
        .pagination .active span,
        .pagination li.active span {
            background-color: #000 !important;
            color: #fff !important;
            border-color: #000 !important;
        }
        
    </style>
    {{ $users->links() }}
</div>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
            const studentId = this.getAttribute('data-id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-form-${studentId}`).submit();
                }
            });
        });
    });
});
</script>
</div>
@endsection
