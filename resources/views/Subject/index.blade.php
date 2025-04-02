@extends('Layout.app')

@section('content')
<style>
    .bg-darkgray {
        background-color: #c9d1cf; 
    }
</style>
<div class="d-flex align-items-center justify-content-between p-3 bg-darkgray rounded">
    <h3 class="mb-0">Subjects</h3>
    <a href="{{route('subjects.create')}}" class="btn btn-secondary d-flex align-items-center">
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
    <table class="table table-light table-striped-columns">
        <thead>
            <tr class="table-dark">
            <th scope="col">Subject Code</th>
            <th scope="col">Subject Name</th>
            <th scope="col">Teacher</th>
            <th scope="col">Description</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
       
        </tbody>
    </table>
</div>
@endsection
