<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Reports</title>
    <link rel="stylesheet" href="{{ asset('css/display2.css') }}">
</head>

{{-- Extending layout --}}
@extends('layouts.app')

{{-- Main section content --}}
@section('nav and foot')
<body>

    {{-- Title --}}
    <h1 class="main-title">Student Reports</h1>

    {{-- Reports Table --}}
    @if($reports->isEmpty())
        <p>No reports found.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>Student IC</th>
                    <th>Report Message</th>
                    <th>Submitted At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reports as $report)
                    <tr>
                        <td>{{ $report->student_ic }}</td>
                        <td>{{ $report->report }}</td>
                        <td>{{ $report->created_at->format('d M Y, h:i A') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    {{-- Footer --}}


</body>
@endsection
</html>
