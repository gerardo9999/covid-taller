@extends('template.app')
@section('content')
<div class="login-box">
    <div class="login-logo">
      <a href="../../index2.html"><b>BOLIVIA </b>WEB</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Inicia sesión para comenzar tu sesión</p>
  
        
        <form action="{{ route('login') }}" method="post">
            @csrf
        
            <div class="input-group mb-3">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror


            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            
            <div class="row">
            <!-- /.col -->
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">Iniciar Sesicon</button>
                </div>
            <!-- /.col -->
            </div>
        </form>

        <div class="social-auth-links text-center mb-3">
            <a href="{{ route('register') }}" class="btn btn-block btn-primary">
              {{-- <i class="fab fa-facebook mr-2"></i>  --}}
              Registrarse
            </a>
            <a href="{{ route('intro.index') }}" class="btn btn-block btn-danger">
              {{-- <i class="fab fa-google-plus mr-2"></i>  --}}
              Regresar al Home
            </a>
        </div>
          <p class="mb-1">
            <a href="forgot-password.html">Olvidaste tu contraseña?</a>
          </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
@endsection
