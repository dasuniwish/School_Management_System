@extends('Layout.app')

@section('content')
<style>
    .bg-darkgray {
        background-color: #0047b3; 
    }
</style>
<div class="d-flex align-items-center justify-content-between p-3 bg-darkgray rounded">
    <h3 class="mb-0">Teachers</h3>
    <a href="{{route('teachers.create')}}" class="btn btn-secondary d-flex align-items-center">
        <i class="bi bi-plus"></i>&nbsp;Add New Teacher
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

<div>
    <table class="table table-light">
        <thead>
            <tr class="table-primary">
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Subject Code</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        @if($teachers -> count() > 0)
            @foreach($teachers as $t)
                <tr>
                    <td class="align-middle">{{ $t -> teacher_id }}</td>
                    <td class="align-middle">{{ $t -> name }}</td>
                    <td class="align-middle">{{ $t -> email }}</td>
                    <td class="align-middle">{{ $t -> phone }}</td>
                    <td class="align-middle">
                        @if($t->subjects->count() > 0)
                            {{ $t->subjects->pluck('subject_code')->implode(', ') }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('teachers.edit', $t->id) }}" class="btn btn-light btn-sm">
                            <i class="bi bi-pencil"></i>
                        </a>
                        &nbsp;
                        <form id="delete-form-{{ $t->id }}" action="{{ route('teachers.destroy', $t->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-light btn-sm delete-btn" data-id="{{ $t->id }}">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach 
        @else
                <tr>
                    <td class="text-center" colspan="6">Teachers not registerd</td>
                </tr>
        @endif  
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
    {{ $teachers->links() }}
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
                    confirmButtonText: 'Yes, delete it!',
                    width: 400,
                    height:100,
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
