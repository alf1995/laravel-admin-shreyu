@extends('layouts.non-auth')

@section('content')
<div class="account-pages my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-6 p-5">
                                <div class="mx-auto mb-5">
                                    <a href="/">
                                        <h3 class="d-inline align-middle ml-1 text-logo">PANEL ADMINISTRACIÓN</h3>
                                    </a>
                                </div>

                                <h6 class="h5 mb-0 mt-4">Restablecer la contraseña</h6>
                                <p class="text-muted mt-1 mb-5">
                                    Ingrese su dirección de correo electrónico y le enviaremos un correo electrónico con instrucciones para restablecer su contraseña.
                                </p>

                                @if(session('error'))<div class="alert alert-danger">{{ session('error') }}</div><br>@endif
                                @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div><br>@endif

                                <form action="{{ route('password.update') }}" method="post" class="authentication-form">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}" />

                                    <div class="form-group">
                                        <label class="form-control-label">Correo</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icon-dual" data-feather="mail"></i>
                                                </span>
                                            </div>
                                            <input type="email" name="email" class="form-control @if($errors->has('email')) is-invalid @endif" id="email"
                                                placeholder="usuario@correo.com" value="{{ old('email')}}" />
                                            
                                            @if($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group mt-4">
                                        <label class="form-control-label">Nueva contraseña</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icon-dual" data-feather="lock"></i>
                                                </span>
                                            </div>
                                            <input type="password" class="form-control @if($errors->has('password')) is-invalid @endif" id="password"
                                                placeholder="Enter your password" name="password" />

                                            @if($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group mt-4">
                                        <label class="form-control-label">Confirmar contraseña</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icon-dual" data-feather="lock"></i>
                                                </span>
                                            </div>
                                            <input type="password" class="form-control @if($errors->has('password_confirmation')) is-invalid @endif" id="password_confirmation"
                                                placeholder="Re-enter your password" name="password_confirmation" />

                                            @if($errors->has('password_confirmation'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" type="submit">Enviar</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6 d-none d-md-inline-block">
                                <div class="auth-page-sidebar">
                                    <div class="overlay"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="text-muted">Back to <a href="pages-login.html"
                                class="text-primary font-weight-bold ml-1">Login</a></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection