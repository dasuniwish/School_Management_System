@extends('Layout.app')

@section('content')
<style>
    .bg-darkgray {
        background-color: #0047b3; 
    }
</style>
<div class="d-flex align-items-center justify-content-between p-3 bg-darkgray rounded">
    <h3 class="mb-0">Class</h3>
    <a href="{{ route('classes.create') }}" class="btn btn-secondary d-flex align-items-center">
        <i class="bi bi-plus"></i>&nbsp;Add New Class
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
    <table class="table table-light ">
        <thead>
            <tr class="table-primary">
                <th scope="col">#</th>
                <th scope="col">Class Name</th>
                <th scope="col">Students</th> 
                <th scope="col">Subject Code</th>
                <th scope="col">Class Teacher</th>
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
        @if($classes->count() > 0)
                @foreach($classes as $c)
                    <tr>
                        <td class="align-middle">{{ $c->class_numeric }}</td>
                        <td class="align-middle">{{ $c->class_name }}</td>
                        <td class="align-middle">{{ $c->students_count }}</td> 
                        <td class="align-middle">{{ $c->class_name }}</td> 
                        <td class="align-middle">{{ $c->teacher_name }}</td> 
                        <td class="align-middle">{{ $c->class_description }}</td>
                        <td>
                            <a href="{{ route('classes.edit', $c->id) }}" class="btn btn-light btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>
                            &nbsp;
                            <form id="delete-form-{{ $c->id }}" action="{{ route('classes.destroy', $c->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-light btn-sm delete-btn" data-id="{{ $c->id }}">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                            <a href="{{ route('classes.assignSubjects', $c->id) }}" class="btn btn-sm btn-primary">Assign Subjects</a>

                        </td>
                    </tr>
                @endforeach 
            @else
                <tr>
                    <td class="text-center" colspan="7">Classes not registered</td>
                </tr>
            @endif  
        </tbody>
    </table>
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