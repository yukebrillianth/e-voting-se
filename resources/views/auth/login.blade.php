@extends('vendor.adminLTE.guest.auth')

@section('title', 'Masuk')

@section('content')
<div class="login-box">
    <div class="login-logo">
      <img src="{{ asset('img/brand/logo-white.png')}}" width="80%" alt="Logo-E-Voting" srcset="">
  </div>
  <br>
  <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body rounded">
        <p class="login-box-msg">{{__('Masuk untuk menggunakan hak pilih anda!')}}</p>
  
        <form action="{{Route('login')}}" method="post">
          @csrf
  
          @error('email')
          <div class="text-danger">{{$message}}</div>
          @enderror
  
          <div class="input-group mb-3">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
  
            <div class="input-group mb-3">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Kata Sandi">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-12">
              <br>
              <button type="submit" class="btn btn-primary w-100">{{__('Masuk')}}</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
  
        <p class="mb-0">
          <a href="{{ $site_settings->enable_register == false ? '' : Route('register') }}" class="text-center {{ $site_settings->enable_register == true ? '' : 'd-none' }}">{{__('Registrasi Pengguna Baru')}}</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
@endsection
