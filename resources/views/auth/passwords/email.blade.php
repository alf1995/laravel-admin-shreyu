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
                                    Ingrese su dirección de correo electrónico y le enviaremos las instrucciones para restablecer su contraseña.
                                </p>

                                @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                                @endif

                                <form action="{{ route('password.email') }}" method="post" class="authentication-form">
                                    @csrf

                                    <div class="form-group">
                                        <label class="form-control-label">Usuario</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="icon-dual" data-feather="mail"></i>
                                                </span>
                                            </div>
                                            <input type="email" name="email"
                                                class="form-control @if($errors->has('email')) is-invalid @endif"
                                                id="email" placeholder="usuario@correo.com" />

                                            @if($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
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
                        <p class="text-muted">Regresar <a href="{{ route('login') }}" class="text-primary font-weight-bold ml-1">Inicio sesión</a>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection