<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Result Management System</title>
    <link rel="stylesheet" href="{{ asset('css/assignment web.css') }}">
    <script src="{{ asset('js/assignment web.js') }}"></script>
</head>
<body>

    {{-- Navigation Bar --}}
    <div class="navigation">
        <nav>
            {{-- Optional: Display user IC if logged in --}}
            {{--
            <div class="user-info">
                @if(session('role') === 'student' || session('role') === 'admin')
                    <span>IC: {{ session('user_ic') }}</span>
                @endif
            </div>
            --}}

            <a href="{{ route('form') }}">HOME</a>
            <a href="{{ route('result') }}">RESULT</a>
            <a href="{{ route('report.display') }}">REPORT</a>

            <div class="logout-btn">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </nav>
    </div>

    {{-- Yield Content --}}
    @yield('nav and foot')

    {{-- Footer --}}
    <footer class="site-footer">
        <p>&copy; 2025 Result Management System. All rights reserved.</p>
        <div class="footer-links">
            <a href="/contact">Contact</a>
        </div>
    </footer>

    {{-- Popup Alert --}}
    @if(session('success'))
        <div id="popup" class="popup">
            {{ session('success') }}
        </div>
    @endif

</body>
</html>
