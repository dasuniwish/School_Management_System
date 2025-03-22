@extends('Layout.app')

@section('content')
<div class="d-flex align-items-center justify-content-between p-3 bg-light rounded">
    <h3 class="mb-0">Add New Teachers</h3>
    <a href="{{route('teachers.index')}}" class="btn btn-secondary d-flex align-items-center">
    <i class="bi bi-arrow-left"></i>&nbsp;Back
    </a>
</div>
@endsection