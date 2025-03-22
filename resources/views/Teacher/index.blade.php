@extends('Layout.app')

@section('content')
<div class="d-flex align-items-center justify-content-between p-3 bg-light rounded">
    <h3 class="mb-0">Teachers</h3>
    <a href="{{route('teachers.create')}}" class="btn btn-secondary d-flex align-items-center">
    <i class="bi bi-plus"></i>&nbsp;Add New Teacher
    </a>
</div>
@endsection