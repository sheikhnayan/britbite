@extends('front.layouts.main')

@section('header')

  <link rel="stylesheet" href="{{ asset('login.css') }}">

@endsection

@section('content')
<section>
  <div class="container">
    <div class="user signinBx">
      <div class="imgBx"><img src="https://raw.githubusercontent.com/WoojinFive/CSS_Playground/master/Responsive%20Login%20and%20Registration%20Form/img1.jpg" alt="" /></div>
      <div class="formBx">
        <form action="{{ route('login') }}" method="POST">
          @csrf
          <h2>Sign In</h2>
          <input type="email" name="email" placeholder="Email" />
          <input type="password" name="password" placeholder="Password" />
          <input type="submit" name="" value="Login" />
          <p class="signup">
            Don't have an account ?
            <a href="#" onclick="toggleForm();">Sign Up.</a>
          </p>
        </form>
      </div>
    </div>
    <div class="user signupBx">
      <div class="formBx">
        <form action="{{ route('register') }}" method="POST">
          @csrf
          <h2>Create an account</h2>
          <input type="text" name="name" placeholder="User Name" />
          <input type="text" name="company_name" placeholder="Restaurant Name" />
          <input type="email" name="email" placeholder="Email Address" />
          <input type="password" name="password" placeholder="Create Password" />
          <input type="password" name="password_confirmation" placeholder="Confirm Password" />
          <input type="submit" name="" value="Sign Up" />
          <p class="signup">
            Already have an account ?
            <a href="#" onclick="toggleForm();">Sign in.</a>
          </p>
        </form>
      </div>
      <div class="imgBx"><img src="https://raw.githubusercontent.com/WoojinFive/CSS_Playground/master/Responsive%20Login%20and%20Registration%20Form/img2.jpg" alt="" /></div>
    </div>
  </div>
</section>
@endsection

@section('script')
    <script>
      const toggleForm = () => {
      const container = document.querySelector('.container');
      container.classList.toggle('active');
    };
    </script>
@endsection
