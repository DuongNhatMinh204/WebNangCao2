<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User</title>
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="/css/user.css">
  <style>
    .error-message {
      background-color: #f8d7da;
      color: #721c24;
      padding: 10px;
      text-align: center;
      font-size: 16px;
      position: fixed;
      top: 10px;
      left: 50%;
      transform: translateX(-50%);
      width: 80%;
      border: 1px solid #f5c6cb;
      border-radius: 5px;
      z-index: 1000;
    }
    .change-password-btn {
      background-color: #ff9800;
      color: white;
      padding: 8px 15px;
      border-radius: 5px;
      text-decoration: none;
      font-weight: bold;
      margin-left: 10px;
    }

    .change-password-btn:hover {
      background-color: #e68900;
    }

  </style>
</head>
<body>
<header>
  <a href="#" class="logo"><span>Future</span>Wonders</a>
  <nav class="bar">
    <a href="home">Home</a>
    <a href="booking">Booking</a>
    <a href="trending">Trending</a>
    <a href="news">News</a>
    <a href="package">Packages</a>
    <a href="services">Services</a>
    <a href="gallery">Gallery</a>
    <a href="review">Review</a>
    <a href="contact">Contact</a>
    <a href="plan-trip">Pay</a>
  </nav>
  <div class="icons">
    <a href="#"><i class="fas fa-search" id="search-btn"></i></a>
    <a href="#"><i class="fas fa-user" id="login-btn" style="color: #29b862;"></i></a>
  </div>
</header>
<div class="video-container">
  <video src="/images/waves.mp4" id="video-slider" loop autoplay muted ></video>
</div>

<!-- Hiển thị thông báo lỗi đăng nhập -->
@if(session('error'))
  <div class="error-message">
    {{ session('error') }}
  </div>
@endif

<!-- Hiển thị thông báo lỗi đăng ký-->
@if($errors->any())
  <div class="error-message">
    <ul>
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif


<form id="sign-in-form" action="/login" method="POST">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <table>
    <tr>
      <td><button type="button" id="show-sign-in" class="indam">SignIn</button></td>
      <td><button type="button" id="show-sign-up">SignUp</button></td>
    </tr>
    <tr>
      <td colspan="2"><input type="tel" name="telephone" placeholder="Enter your telephone: " required></td>
    </tr>
    <tr>
      <td colspan="2"><input type="password" name="password" placeholder="Enter your password" required></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" value="Sign In"></td>
    </tr>
  </table>
</form>


<form id="sign-up-form" action="/register" method="POST" class="hidden">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <table>
    <tr>
      <td><button type="button" id="show-sign-in">SignIn</button></td>
      <td><button type="button" id="show-sign-up" class="indam">SignUp</button></td>
    </tr>
    <tr>
      <td colspan="2"><input type="text" name="name" placeholder="Enter your name: " value="{{ old('name') }}" required></td>
    </tr>
    <tr>
      <td colspan="2"><input type="email" name="email" placeholder="Enter your email: " value="{{ old('email') }}" required></td>
    </tr>
    <tr>
      <td colspan="2"><input type="tel" name="telephone" placeholder="Enter your telephone: " value="{{ old('telephone') }}" required></td>
    </tr>
    <tr>
      <td colspan="2"><input type="password" name="password" placeholder="Create your password" required></td>
    </tr>
    <tr>
      <td colspan="2"><input type="password" name="password_confirmation" placeholder="Confirm your password" required></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" value="Sign Up"></td>
    </tr>
  </table>
</form>

<script>
  
  const signInForm = document.getElementById('sign-in-form');
const signUpForm = document.getElementById('sign-up-form');

document.querySelectorAll('#show-sign-in').forEach(button => {
  button.addEventListener('click', () => {
    signUpForm.classList.add('hidden');
    signInForm.classList.remove('hidden');
  });
});

document.querySelectorAll('#show-sign-up').forEach(button => {
  button.addEventListener('click', () => {
    signInForm.classList.add('hidden');
    signUpForm.classList.remove('hidden');
  });
});

</script>
</body>
</html>
