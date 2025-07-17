  <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <title>Result Management System</title>
      <link rel="stylesheet" href="css/student.css">
      <script src="js/assignment web.js"></script>
    </head>

    <body>
  <div class="navigation">
    <nav >
      <a href="/home"> RESULT</a>
      <a href="/feedback">REPORT</a>
      <div class="logout-btn">
      <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button type="submit">Logout</button>
      </form>
      </div>
    </div>
  </nav></div>

        @yield('student')
        <footer class="site-footer">
          <p>&copy; 2025 Result Management System. All rights reserved.</p>
            <div class="footer-links">
            <a href="/contact">Contact</a>
            </div>
            </footer>
            {{-- popup after user submit --}}
            @if(session('success'))
          <div id="popup" class="popup">
          {{ session('success') }}
        </div>
        @endif
    </body>

  </html>