@extends('layouts.vertical')


@section('css')
<!-- Plugins css -->
<link href="{{ asset('assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/multiselect/multiselect.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">Usuario</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar</li>
            </ol>
        </nav>
        <h4 class="mb-1 mt-0">Editar usuario</h4>
    </div>
</div>
@endsection

@section('content')


<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">

                <form action="{{ route('user.update', $user->id) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
                @method('PUT')
                {{ csrf_field() }}
                    
                    <div class="form-group">
                      @if (count($errors) > 0)
                      <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5 style="color: white;"><i data-feather="alert-circle"></i> Error</h5>
                        <ul>
                          @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div>
                      @endif

                      @if(Session::has('success'))
                      <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5 style="color: white;"><i data-feather="check-circle"></i> Exito</h5>
                        {{Session::get('success')}}
                      </div>
                      @endif
                    </div>

                    <div class="form-group">
                        <label for="exampleInputNombre">Nombre</label>
                        <input type="text" class="form-control" id="exampleInputNombre" name="name" value="{{old('name', $user->name)}}" maxlength="70" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputApellido">Apellido</label>
                        <input type="text" class="form-control" id="exampleInputApellido" name="last_name" value="{{old('last_name', $user->last_name)}}" maxlength="70" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">Correo</label>
                        <input type="email" class="form-control" id="exampleInputEmail" name="email" value="{{old('email', $user->email)}}" maxlength="70" autocomplete="off">
                    </div>
                  
                    <div class="form-group">
                        <label for="exampleInputTelefono">Telefono</label>
                        <input type="text" class="form-control" id="exampleInputTelefono" name="phone" value="{{old('phone', $user->phone)}}" maxlength="20" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Contraseña</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password"  placeholder="Contraseña" autocomplete="new-password">
                    </div>

                    <div class="form-group">
                        <label for="roles">Roles*
                        <span class="btn btn-info btn-xs select-all">Seleccionar todos</span>
                        <span class="btn btn-info btn-xs deselect-all">Deseleccionar todos</span></label>
                         <select name="roles[]" id="roles" data-plugin="customselect" class="form-control select2" multiple>
                          @foreach($roles as $id => $roles)
                              <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles()->pluck('name', 'id')->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                          @endforeach
                      </select>
                    </div>
                  
                    <div class="form-group">
                        <label class="" for="example-fileinput">Imagen: (Max:500px*500px)</label>
                        <input type="file" name="image" class="form-control custom-style-file" id="example-fileinput" >
                    </div>
                    <div class="form-group mb-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="checkmeout0" name="is_actived" {{ old('is_actived', $user->is_actived) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="checkmeout0">Activar</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar</button>
              </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<!-- Plugins Js -->
<script src="{{ asset('assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ asset('assets/libs/multiselect/multiselect.min.js') }}"></script>
<script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap-colorpicker/bootstrap-colorpicker.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js') }}"></script>
@endsection

@section('script-bottom')
<script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script>
@endsection