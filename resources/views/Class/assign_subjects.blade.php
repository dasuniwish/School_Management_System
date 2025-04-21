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
                    <h2 class="text-black mb-0">Assign Subjects</h2>
                </div>
                <p class="mb-3"><strong>Class:</strong> {{ $class->class_name }}</p>

                <form method="POST" action="{{ route('classes.storeAssignedSubjects', $class->id) }}">
                    @csrf
                    <div class="form-group">
                        <label><strong>Select Subjects:</strong></label><br>
                        @foreach($subjects as $subject)
                            <div class="form-check">
                                <input 
                                    class="form-check-input" 
                                    type="checkbox" 
                                    name="subjects[]" 
                                    value="{{ $subject->id }}" 
                                    id="subject_{{ $subject->id }}"
                                    {{ in_array($subject->id, $assigned) ? 'checked' : '' }}
                                >
                                <label class="form-check-label" for="subject_{{ $subject->id }}">
                                    {{ $subject->subject_name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Assign</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
