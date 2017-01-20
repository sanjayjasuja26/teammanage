@extends('layout.auth')
@section('content')

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
      <div>
        <h1 class="logo-name">IN+</h1>
      </div>
      <h3>Welcome to IN+</h3>
      <p>Perfectly designed anddfdf precisely prepared admin theme with over 50 pages with extra new web app views.
      <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
      </p>
      <p>Login in. To see it in action.</p>
      @if(Session::has('success'))
    <div class="alert-box success">
        <h2>{{ Session::get('success') }}</h2>
    </div>
     @endif
        <form class="m-t" role="form" method="POST" action="/login">
            @include('errors.error')
            {{ csrf_field() }}
              <div class="form-group">
                  <input type="email" name="email" class="form-control" placeholder="Email" required="">
                </div>
              <div class="form-group">
                  <input type="password" name="password" class="form-control" placeholder="Password" required="">
              </div>
              <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
              <a href="#"><small>Forgot password?</small></a>
              <p class="text-muted text-center"><small>Do not have an account?</small></p>
              <a class="btn btn-sm btn-white btn-block" href="register">Create an account</a>
        </form>
      <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
    </div>
</div>

@endsection
