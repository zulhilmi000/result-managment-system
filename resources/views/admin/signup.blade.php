<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/REGISTER.css') }}">
</head>
<body>

    <h1 class="main-title">REGISTER</h1>

    <div class="form-container">
        <form method="POST" action="{{ route('register.store') }}">
            @csrf

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
            </div>

            <div class="form-group">
                <label for="IC">IC</label>
                <input type="number" id="IC" name="IC" placeholder="Enter your IC" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>

            <div class="form-group">
                <label for="re-password">Re-enter Password</label>
                <input type="password" id="re-password" name="re-password" placeholder="Re-enter your password" required>
            </div>

            <button type="submit">REGISTER</button>

            @if ($errors->any())
                <div class="alert" style="color: red; margin-top: 10px;">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="register-link">
                <br>
                <a href="/">Already have an account? LOGIN</a>
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
