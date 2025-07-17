<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Results</title>
    <link rel="stylesheet" href="css/student.css">
</head>
<body>

  <!-- Navigation Bar -->
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

  <!-- Main Content Wrapper -->
  <div class="wrapper">
    <h1 class="main-title">Welcome, here is your result</h1>

    @if($results->isEmpty())
      <p>No results found.</p>
    @else
      <table>
        <thead>
          <tr>
            <th>Subject</th>
            <th>Marks</th>
          </tr>
        </thead>
        <tbody>
          @foreach($results as $result)
            <tr>
              <td>{{ $result->student_subject }}</td>
              <td>{{ $result->student_mark }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>

  <!-- Footer -->
  <footer class="site-footer">
    <p>&copy; 2025 Result Management System. All rights reserved.</p>
    <div class="footer-links">
      <a href="/contact">Contact</a>
    </div>
  </footer>

  <!-- Success Popup -->
  @if(session('success'))
    <div id="popup" class="popup">
      {{ session('success') }}
    </div>
  @endif

</body>
</html>
