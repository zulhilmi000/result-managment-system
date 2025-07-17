<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Result</title>
    <link rel="stylesheet" href="{{ asset('css/assignment web.css') }}">
    <script src="{{ asset('js/assignment web.js') }}"></script>
</head>

{{-- Extending layout --}}
@extends('layouts.app')

{{-- Main section content --}}
@section('nav and foot')
<body>

    <h1 class="main-title">Edit Result</h1>

    <div class="form">
        <form action="{{ route('update', ['display2' => $display2->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="student_name">Student Name</label>
                <input type="text" name="student_name" id="student_name" value="{{ $display2->student_name }}" required>
            </div>

            <div class="form-group">
                <label for="student_ic">Student IC</label>
                <input type="text" name="student_ic" id="student_ic" value="{{ $display2->student_ic }}" required>
            </div>

            <div class="form-group">
                <label for="student_subject">Student Subject</label>
                <input type="text" name="student_subject" id="student_subject" value="{{ $display2->student_subject }}" required>
            </div>

            <div class="form-group">
                <label for="student_mark">Student Mark</label>
                <input type="number" name="student_mark" id="student_mark" value="{{ $display2->student_mark }}" min="0" max="100" required>
            </div>

            <div class="submit-btn">
                <button type="submit" class="submit-button">Update</button>
            </div>
        </form>
    </div>

    {{-- Success Popup --}}
    @if(session('success'))
        <div id="popup" class="popup">
            {{ session('success') }}
        </div>
    @endif


</body>
@endsection
</html>
