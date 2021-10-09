@extends('layouts.vertical')


@section('css')
<!-- plugin css -->
<link href="{{ asset('assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">Roles</a></li>
                <li class="breadcrumb-item active" aria-current="page">Listar</li>
            </ol>
        </nav>
        <h4 class="mb-1 mt-0">Listado de roles</h4>
    </div>
</div>
@endsection

@section('content')
<div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dt-buttons btn-group"> 
                                <a href="{{ route('roles.create')}}" class="btn btn-secondary buttons-copy buttons-html5" tabindex="0" aria-controls="datatable-buttons" type="button">
                                    <span>Agregar roles</span>
                                </a> 
                            </div>
                        </div>
                    </div>
                   
                    @if(Session::has('success'))
                      <div class="form-group" style="margin-top: 2%;">  
                          <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5 style="color: white;"><i data-feather="check-circle"></i> Exito</h5>
                            {{Session::get('success')}}
                          </div>
                      </div>
                    @endif
                    
                    <table  class="table dt-responsive nowrap dataTable">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Nombre</th>
                                <th class="text-center">Permisos</th>
                                <th class="text-center">Acción</th>
                            </tr>
                        </thead>
                    
                        <tbody>
                            @foreach($roles as $key => $role)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $role->name ?? '' }}</td>
                                <td class="text-center">
                                    @foreach($role->permissions()->pluck('name') as $permission)
                                      <label class="badge badge-soft-primary">{{ $permission }}</label>
                                    @endforeach
                                </td>
                                <td class="text-center">
                                    <small class="btn-display">
                                    <a href="{{ route('roles.show',$role->id)}}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="bottom" data-toggle="tooltip" data-original-title="Observar">
                                      <i data-feather="eye"></i>    
                                    </a>
                                    </small>
                                    <small class="btn-display">
                                    <a href="{{ route('roles.edit',$role->id)}}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="bottom" data-toggle="tooltip" data-original-title="Editar">
                                      <i data-feather="edit"></i>
                                    </a>
                                    </small>
                                    <small class="btn-display">
                                    <a href="javascript:void(0);" onclick="deleteData('{{ route('roles.destroy',$role->id) }}')" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" data-toggle="tooltip" data-original-title="Eliminar"><i data-feather="trash"></i></a>
                                    </small>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div> 
            </div>
        </div>
    </div>


@endsection

@section('script')
<script src="{{ asset('assets/libs/datatables/datatables.min.js') }}"></script>
@endsection

@section('script-bottom')
@if(isset($jqueryDataTable) && isset($clasesDataTable))
<script type="text/javascript">
    $(document).ready(function(){
        var jqueryDataTable = {!! $jqueryDataTable !!};
        var clasesDataTable = '{{ $clasesDataTable }}';
        $(clasesDataTable).DataTable(jqueryDataTable);
    });
</script> 
<script src="//cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="{{ asset('dashbord/script.js') }}"></script>   
@endif
@endsection