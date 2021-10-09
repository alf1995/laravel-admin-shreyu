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

                <form action="{{ route('permissions.update',$permission->id) }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
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
                        <input type="text" class="form-control" id="exampleInputNombre" name="name" value="{{ old('name', isset($permission) ? $permission->name : '') }}" maxlength="70" autocomplete="off">
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