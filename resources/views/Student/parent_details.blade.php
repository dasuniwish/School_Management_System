@extends('Layout.app')

@section('content')
<style>
    .bg-darkgray {
        background-color: #0047b3;
    }
</style>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8 col-lg-4">
            <div class="border p-4 rounded shadow">
                <div class="bg-darkgray rounded p-2 mb-3 text-center">
                    <h2 class="text-black mb-0">{{ $student->student_name }}</h2>
                </div>
                <p class="mb-3"><strong>Class:{{ $student->student_id }}</strong></p>

               
            </div>
        </div>
    </div>
</div>
@endsection
