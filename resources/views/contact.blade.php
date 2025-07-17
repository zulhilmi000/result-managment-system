<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <style>
      .contact-container {
        max-width: 400px;
        margin: 40px auto 0 auto;
        background: rgba(255,255,255,0.08);
        border-radius: 18px;
        box-shadow: 0 4px 18px rgba(0,0,0,0.10);
        padding: 32px 28px 24px 28px;
        color: #fff;
      }
      .contact-container h2 {
        text-align: center;
        margin-bottom: 18px;
      }
      .contact-container label {
        display: block;
        margin-bottom: 6px;
        font-weight: 600;
      }
      .contact-container input,
      .contact-container textarea {
        width: 100%;
        padding: 10px;
        border-radius: 8px;
        border: 1px solid #ccc;
        margin-bottom: 16px;
        font-size: 15px;
      }
      .contact-container button {
        width: 100%;
        padding: 10px;
        background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        color: #fff;
        border: none;
        border-radius: 8px;
        font-weight: bold;
        font-size: 16px;
        cursor: pointer;
        transition: background 0.2s;
      }
      .contact-container button:hover {
        background: linear-gradient(135deg, #2575fc 0%, #6a11cb 100%);
      }
      .contact-info {
        margin-top: 24px;
        font-size: 14px;
        text-align: center;
        color: #e0e0e0;
      }
      .success-message {
        background: #4CAF50;
        color: #fff;
        padding: 10px 0;
        border-radius: 8px;
        text-align: center;
        margin-bottom: 16px;
      }
    </style>
</head>
<body>
  <div class="contact-container">
    <h2>Contact Us</h2>
    @if(session('success'))
      <div class="success-message">{{ session('success') }}</div>
    @endif
    <form method="POST" action="{{ route('contact.submit') }}">
      @csrf
      <label for="name">Name</label>
      <input type="text" id="name" name="name" required>
      <label for="email">Email</label>
      <input type="email" id="email" name="email" required>
      <label for="message">Message</label>
      <textarea id="message" name="message" rows="4" required></textarea>
      <button type="submit">Send Message</button>
    </form>
    <a href="{{ url()->previous() }}" class="contact-back-btn">Back</a>
    <div class="contact-info">
      <p>Email: info@resultsystemkpmim.com</p>
      <p>Phone: +60 12-345 6789</p>
      <p>Address: Kolej Professional Mara Indera Mahkota, Malaysia</p>
    </div>
  </div>
</body>
</html> 