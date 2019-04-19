@extends('layouts.app')

@section('content')


  <body class="mh-fullscreen bg-img center-vh p-20" style="background-image: url(assets/img/bg-girl.jpg);">




    <div class="card card-shadowed p-50 w-400 mb-0" style="max-width: 100%">
      <h5 class="text-uppercase text-center">Register</h5>
      <br><br>

      <form class="form-type-material" action="/register" method="POST">
        @csrf
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Full Name" name="name">
        </div>

        <div class="form-group">
          <input type="email" class="form-control" placeholder="Email address" name="email">
        </div>

        <div class="form-group">
          <input type="password" class="form-control" placeholder="Password" name="password">
        </div>

        {{-- <div class="form-group">
          <input type="password" class="form-control" placeholder="Password (confirm)">
        </div> --}}

        <div class="form-group">
          <label class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input">
            <span class="custom-control-indicator"></span>
            <span class="custom-control-description">I agree to all <a class="text-primary" href="#">terms</a></span>
          </label>
        </div>

        <br>
        <button class="btn btn-bold btn-block btn-primary" type="submit">Register</button>
      </form>

      <hr class="w-30">

      <p class="text-center text-muted fs-13 mt-20">Already have an account? <a href="page-login.html">Sign in</a></p>
    </div>



@endsection
