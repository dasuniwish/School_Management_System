@extends('Layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8 col-lg-4">
            <div class="border p-4 rounded shadow">
                <h2 class="text-center mb-4">Assign Subjects</h2>
                <p><strong>Class:</strong> {{ $class->class_name }}</p>
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
