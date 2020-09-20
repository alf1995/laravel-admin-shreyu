@extends('layouts.vertical')


@section('css')

@endsection

@section('breadcrumb')
<div class="row page-title">
    <div class="col-md-12">
        <nav aria-label="breadcrumb" class="float-right mt-1">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">Usuario</a></li>
                <li class="breadcrumb-item active" aria-current="page">Observar</li>
            </ol>
        </nav>
        <h4 class="mb-1 mt-0">Datos de usuario</h4>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="text-center mt-3">
                    @if(!empty($user->image))
                    <img src="{{ Packer::img('/images/user/'.$user->image, 'resize,25%,25%,center,middle') }}" alt="{{ $user->name }}" class="avatar-lg rounded-circle" />
                    @else
                    <img src="{{ Packer::img('/images/user/empty.png', 'resize,25%,25%,center,middle') }}" alt="{{ $user->name }}" class="avatar-lg rounded-circle" />
                    @endif
                    <h5 class="mt-2 mb-0">{{ $user->name }}</h5>
                </div>

                <div class="mt-3 pt-2 border-top">
                    <h4 class="mb-3 font-size-15">Información</h4>
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0 text-muted">
                            <tbody>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Phone</th>
                                    <td>{{ $user->phone }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Fecha registro</th>
                                    <td>{{ \Carbon\Carbon::parse($user->created_at)->translatedFormat('d F Y') }} </td>
                                </tr>
                                <tr>
                                    <th scope="row">Estado</th>
                                    <td>{!! Helper::get_status($user->is_actived) !!}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="mt-3 pt-2 border-top">
                    <h4 class="mb-3 font-size-15">Permisos</h4>
                    @foreach($user->roles()->pluck('name') as $role)
                        <label class="badge badge-soft-primary">{{ $role }}</label>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

</div>

@endsection

@section('script')
@endsection

@section('script-bottom')
@endsection