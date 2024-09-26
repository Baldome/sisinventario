@extends('adminlte::page')

@section('title', 'SIS-Inventario | detalle usuario')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1><b>DETALLES DEL USUARIO</b></h1>
        </div>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary shadow col-md-12">
                        <div class="card-header with-border">
                            <h3 class="card-title text-lg">Datos registrados del usuario:
                                <b>{{ $user->name . ' ' . $user->last_name }}</b>
                            </h3>
                            <div class="card-tools">
                                @can('eliminar usuario')
                                    <form style="display: inline" action="{{ route('user.destroy', $user) }}" method="POST"
                                        onclick="ask{{ $user->id }}(event)" id="myform{{ $user->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <div class="btn-group pull-right me-2">
                                            <a class="btn btn-sm btn-danger delete" title="Eliminar">
                                                <i class="fa-solid fa-trash mr-2"></i><span class="hidden-xs">Eliminar</span>
                                            </a>
                                        </div>
                                    </form>
                                @endcan
                                @can('editar usuario')
                                    <div class="btn-group pull-right me-2">
                                        <a href="{{ route('user.edit', [$user]) }}" class="btn btn-sm btn-primary"
                                            title="Editar">
                                            <i class="fa-solid fa-edit mr-2"></i><span class="hidden-xs">Editar</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('listar usuarios')
                                    <div class="btn-group pull-right">
                                        <a href="{{ route('user.index') }}" class="btn btn-sm btn-secondary" title="Listar">
                                            <i class="fa-solid fa-list mr-2"></i><span class="hidden-xs">Listar</span>
                                        </a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                        <div class="form-horizontal">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <label style="text-align: end" class="col-sm-4 form-label">Id</label>
                                            <div class="col-sm-8 show-value">
                                                {{ $user->id }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label style="text-align: end" class="col-sm-4 form-label">Cédula de
                                                identidad</label>
                                            <div class="col-sm-8 show-value">
                                                {{ $user->ci }} {{ $user->ci_dep }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label style="text-align: end" class="col-sm-4 form-label">Nombres</label>
                                            <div class="col-sm-8 show-value">
                                                {{ $user->name }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label style="text-align: end" class="col-sm-4 form-label">Apellidos</label>
                                            <div class="col-sm-8 show-value">
                                                {{ $user->last_name }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label style="text-align: end" class="col-sm-4 form-label">Email</label>
                                            <div class="col-sm-8 show-value">
                                                {{ $user->email }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label style="text-align: end" class="col-sm-4 form-label">Estado</label>
                                            <div class="col-sm-8 show-value">
                                                @if ($user->is_active)
                                                    <span class="badge bg-success mx-1">Activo</span>
                                                @else
                                                    <span class="badge bg-danger mx-1">Inactivo</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label style="text-align: end" class="col-sm-4 form-label">Fechae de
                                                nacimiento</label>
                                            <div class="col-sm-8 show-value">
                                                {{ $user->birth_date }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label style="text-align: end" class="col-sm-4 form-label">Género</label>
                                            <div class="col-sm-8 show-value">
                                                {{ $user->gender }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label style="text-align: end" class="col-sm-4 form-label">Rol</label>
                                            <div class="col-sm-8 show-value">
                                                @if (!empty($user->getRoleNames()))
                                                    @foreach ($user->getRoleNames() as $role_name)
                                                        <label class="badge bg-primary mx-1">{{ $role_name }}</label>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label style="text-align: end" class="col-sm-4 form-label">Teléfono
                                                celular</label>
                                            <div class="col-sm-8 show-value">
                                                {{ $user->phone }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label style="text-align: end" class="col-sm-4 form-label">Dirección</label>
                                            <div class="col-sm-8 show-value">
                                                {{ $user->address }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label style="text-align: end" class="col-sm-4 form-label">Fecha creada</label>
                                            <div class="col-sm-8 show-value">
                                                {{ $user->created_at }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label style="text-align: end" class="col-sm-4 form-label">Fecha
                                                actualizada</label>
                                            <div class="col-sm-8 show-value">
                                                {{ $user->updated_at }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row" style="text-align: center">
                                            <div class="col-sm-12 show-value">
                                                <label class="form-label">Foto de
                                                    perfil</label>
                                                <img src="{{ $user->profile_photo_path }}" alt="Foto de perfil"
                                                    width="250">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        function ask{{ $user->id }}(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Eliminar registro',
                text: '¿Desea eliminar este registro?',
                icon: 'question',
                showDenyButton: true,
                confirmButtonText: 'Eliminar',
                confirmButtonColor: 'red',
                denyButtonColor: '#270a0a',
                denyButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    var form = $('#myform{{ $user->id }}');
                    form.submit();
                }
            });
        }
    </script>
@stop
