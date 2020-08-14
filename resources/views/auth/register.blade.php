@extends('template.app')
@section('content')
<div class="register-box">
    <div class="register-logo">
      <a href="{{ route('intro.index') }}"><b>BOLIVIA</b>WEB</a>
    </div>
  
    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Registrar una menbresia</p>
  
        <form action="{{ route('register') }}" method="post">
          @csrf
            <div class="input-group mb-3">
                <input type="text" name="name"  class="form-control @error('name') is-invalid  @enderror" required placeholder="nombre usuario">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="input-group mb-3">
                <input type="email" name="email" class="form-control @error('email') is-invalid  @enderror" required placeholder="Correo Electronico">
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
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required placeholder="Password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <div class="input-group mb-3">
                <input type="password" name="password_confirmation" required class="form-control" placeholder="Repetir password">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Registrar</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
  
        <div class="social-auth-links text-center">
          <a href="{{ route('login') }}" class="btn btn-block btn-primary">
            {{-- <i class="fab fa-facebook mr-2"></i> --}}
             Iniciar Sesion
          </a>
          <a href="{{ route('intro.index') }}" class="btn btn-block btn-danger">
            {{-- <i class="fab fa-google-plus mr-2"></i> --}}
            Regresar al Home
          </a>
        </div>
{{--   
        <a href="{{ route('login') }}" class="text-center">Ya tienes una membresia?</a> --}}
      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
    
  </div>
@endsection
