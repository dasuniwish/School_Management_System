@extends('Layout.app')

@section('content')
<style>
    .bg-darkgray {
        background-color: #0047b3; 
    }
</style>
<div class="d-flex align-items-center justify-content-between p-3 bg-darkgray rounded">
    <h3 class="mb-0">Students</h3>
    <a href="{{route('students.create')}}" class="btn btn-secondary d-flex align-items-center">
        <i class="bi bi-plus"></i>&nbsp;Add New Student
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
      
        </tbody>
    </table>
</div>
@endsection
