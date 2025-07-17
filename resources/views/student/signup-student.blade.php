<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Register</title>
    <link rel="stylesheet" href="{{ asset('css/REGISTER.css') }}">
</head>
<body>

    <h1 class="main-title">REGISTER</h1>

    <div class="form-container">

        @if($errors->any())
            <div class="alert" style="color: red;">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register-student.store') }}">
            @csrf

            <div class="form-group">
                <label for="student_name">Full Name</label>
                <input type="text" id="student_name" name="student_name" placeholder="Your full name" required>
            </div>

            <div class="form-group">
                <label for="IC">IC</label>
                <input type="number" id="IC" name="IC" placeholder="Enter your IC without dash (-)" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>

            <div class="form-group">
                <label for="re-password">Re-enter Password</label>
                <input type="password" id="re-password" name="re-password" placeholder="Re-enter your password" required>
            </div>

            <button type="submit">Register</button>

            <div class="register-link">
                <br>
                <a href="/">Already have an account? Login</a>
            </div>
        </form>
    </div>

    <footer class="site-footer">
        <p>&copy; 2025 Result Management System. All rights reserved.</p>
        <div class="footer-links">

            <a href="/contact">Contact</a>
        </div>
    </footer>

</body>
</html>
