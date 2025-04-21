@extends('Layout.app')

@section('content')
<style>
    .bg-darkgray {
        background-color: #0047b3; 
    }
</style>
<div class="d-flex align-items-center justify-content-between p-3 bg-darkgray rounded">
    <h3 class="mb-0">Subjects</h3>
    <a href="{{ route('subjects.create') }}" class="btn btn-secondary d-flex align-items-center">
        <i class="bi bi-plus"></i>&nbsp;Add New Subject
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
                <th scope="col">Subject Code</th>
                <th scope="col">Subject Name</th>
                <th scope="col">Teacher</th> 
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @if($subjects->count() > 0)
                @foreach($subjects as $s)
                    <tr>
                        <td class="align-middle">{{ $s->subject_code }}</td>
                        <td class="align-middle">{{ $s->subject_name }}</td>
                        <td class="align-middle">{{ $s->teacher_name }}</td> 
                        <td class="align-middle">{{ $s->description }}</td>
                        <td>
                            <a href="{{ route('subjects.edit', $s->id) }}" class="btn btn-light btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>
                            &nbsp;
                            <form action="{{ route('subjects.destroy', $s->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-light btn-sm" onclick="return confirm('Are you sure you want to delete this subject?');">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach 
            @else
                <tr>
                    <td class="text-center" colspan="5">No subjects registered</td>
                </tr>
            @endif  
        </tbody>
    </table>
</div>
@endsection
