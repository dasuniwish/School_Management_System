@extends('Layout.app')

@section('content')
<style>
    .bg-darkgray {
        background-color: #c9d1cf; /* Dark Gray */
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

<table class="table table-light table-striped-columns">
  <thead>
    <tr class="table-dark">
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
                <td class="align-middle">{{ $t -> user_id }}</td>
                <td class="align-middle">{{ $t -> name }}</td>
                <td class="align-middle">{{ $t -> email }}</td>
                <td class="align-middle">{{ $t -> phone }}</td>
            </tr>
        @endforeach 
    @endif  
  </tbody>
</table>
</div>
@endsection
