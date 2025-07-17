<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

  <div class="login-logo-wrapper">
    <div class="login-logo-border">
      <img src="{{ asset('images/logo.png') }}" alt="Logo" class="login-logo-img">
    </div>
  </div>
  <h1 class="main-title">LOGIN</h1>

  <div class="form-container">
    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="form-group">
        <label for="role">Select Role</label>
        <select name="role" id="role" required>
          <option value="">Select Role</option>
          <option value="admin">Admin</option>
          <option value="student">Student</option>
        </select>
      </div>

      <div class="form-group">
        <label for="IC">IC</label>
        <input type="number" id="IC" name="IC" placeholder="Enter your IC" required>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
      </div>

      <button type="submit">Login</button>

      @if ($errors->any())
        <div class="alert" style="color: red; margin-top: 10px;">
          {{ $errors->first() }}
        </div>
      @endif

      @if (session('success'))
        <div id="popup" class="popup">
          {{ session('success') }}
        </div>
      @endif

      <div class="register-link">
        <p>Don't have an account? Register here:</p>
        <a href="/register-admin">Register as Admin</a>
        <a href="/register-student">Register as Student</a>
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
