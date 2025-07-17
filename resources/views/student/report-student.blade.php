<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Submit Report</title>
  <link rel="stylesheet" href="{{ asset('css/student.css') }}">
</head>
<body>

  <!-- Navigation -->
  <div class="navigation">
    <nav>
      <a href="{{ route('home') }}">RESULT</a>
      <a href="{{ route('report') }}">REPORT</a>
      <div class="logout-btn">
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit">Logout</button>
        </form>
      </div>
    </nav>
  </div>

  <!-- Page Content -->
  <div class="wrapper">
    <h1 class="main-title">Submit Your Report</h1>

    <div class="form">
      <form action="{{ route('report.store') }}" method="POST">
        @csrf

        <div class="form-group">
          <label for="student_ic">IC</label>
          <input type="number" name="student_ic" id="student_ic" value="{{ session('student_ic') }}" readonly>
        </div>

        <div class="form-group">
          <label for="report">Report</label>
          <textarea name="report" id="report" placeholder="Enter your report" rows="5" required></textarea>
        </div>

        <div class="submit-btn">
          <button type="submit">Submit Report</button>
        </div>
      </form>
    </div>
  </div>
  <!-- Success Popup -->
  @if(session('success'))
    <div id="popup" class="popup">
      {{ session('success') }}
    </div>
  @endif
  <!-- Footer -->
  <footer class="site-footer">
    <p>&copy; 2025 Result Management System. All rights reserved.</p>
    <div class="footer-links">
      <a href="/contact">Contact</a>
    </div>
  </footer>



</body>
</html>
