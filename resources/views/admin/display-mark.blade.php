<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHOW</title>
    <link rel="stylesheet" href="{{ asset('css/display2.css') }}">
</head>

{{-- Extending layout --}}
@extends('layouts.app')

{{-- Main section content --}}
@section('nav and foot')
<body>

    <h1 class="main-title">Overall Result - </h1>

    <!-- Search Bar for IC -->
    <form method="GET" action="" style="margin-bottom: 20px;">
        <input type="text" name="search_ic" placeholder="Search by Student IC" value="{{ request('search_ic') }}" style="padding: 8px; border-radius: 8px; border: 1px solid #ccc; width: 250px;">
        <button type="submit" style="width: 80px; padding: 5px 0; border-radius: 8px; background: #4CAF50; color: white; border: none; font-size: 14px;">Search</button>
        @if(request('search_ic'))
            <a href="{{ url()->current() }}" style="margin-left: 10px; color: #e74c3c; text-decoration: underline;">Clear</a>
        @endif
    </form>

    {{-- If no data --}}
    @if($admin->isEmpty())
        <p>No results available.</p>
    @else
        {{-- Display Results Table --}}
        <table>
            <thead>
                <tr>
                    <th>NAME</th>
                    <th>IC</th>
                    <th>Subject</th>
                    <th>Marks</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($admin as $admins)
                    <tr>
                        <td>{{ $admins->student_name }}</td>
                        <td>{{ $admins->student_ic }}</td>
                        <td>{{ $admins->student_subject }}</td>
                        <td>{{ $admins->student_mark }}</td>
                        <td>
                            {{-- Edit Button --}}
                            <a href="{{ route('edit', ['display2' => $admins->id]) }}">
                                <button>Edit</button>
                            </a>

                            {{-- Delete Button --}}
                            <form action="{{ route('delete', ['display2' => $admins->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{--  yield for custom table content --}}
        @yield('table')
    @endif

    {{-- Success Popup --}}
    @if(session('success'))
        <div id="popup" class="popup">
            {{ session('success') }}
        </div>
    @endif



</body>
@endsection
</html>
