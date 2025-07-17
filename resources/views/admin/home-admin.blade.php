<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Result Management System</title>
    <link rel="stylesheet" href="{{ asset('css/student.css') }}">
</head>

{{-- Extending layout --}}
@extends('layouts.app')

{{-- Main section content --}}
@section('nav and foot')
<body>

    {{-- Page Title --}}
    <h1 class="main-title">Result Management System</h1>

    {{-- Form to submit student result --}}
    <div class="form">
        <form id="resultForm" method="POST" action="{{ route('result.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Student Name</label>
                <input type="text" id="name" name="student_name" placeholder="e.g. Aiman Zulkarnain" required>
            </div>

            <div class="form-group">
                <label for="ic">IC Number</label>
                <input type="text" id="ic" name="student_ic" placeholder="e.g. 010203041234" required>
            </div>

            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="student_subject" placeholder="e.g. Web Programming" required>
            </div>

            <div class="form-group">
                <label for="marks">Marks</label>
                <input type="number" id="marks" name="student_mark" min="0" max="100" placeholder="0 - 100" required>
            </div>

            <div class="submit-btn">
                <button type="submit" class="submit-buttn">Submit Result</button>
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
