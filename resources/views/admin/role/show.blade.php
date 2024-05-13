@extends('adminlte::page')

@section('title', 'SIS-Inventario | Detalle rol')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4>Detalle del rol : <span class="text-bold">{{ $role->name }}</span></h4>
        </div>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-border col-md-12">
                <div class="card-header with-border">
                    <h3 class="card-title">Datos registrados</h3>
                    <div class="card-tools">
                        <form style="display: inline" action="{{ route('role.destroy', $role) }}" method="POST"
                            onclick="ask{{ $role->id }}(event)" id="myform{{ $role->id }}">
                            @csrf
                            @method('DELETE')
                            <div class="btn-group pull-right me-2">
                                <a class="btn btn-sm btn-danger delete">
                                    <i class="zmdi zmdi-delete mr-2"></i><span class="hidden-xs">Eliminar</span>
                                </a>
                            </div>
                        </form>
                        <div class="btn-group pull-right me-2">
                            <a href="{{ route('role.edit', $role) }}" class="btn btn-sm btn-primary edit">
                                <i class="zmdi zmdi-edit mr-2"></i><span class="hidden-xs">Editar</span>
                            </a>
                        </div>
                        <div class="btn-group pull-right">
                            <a href="{{ route('role.index') }}" class="btn btn-sm btn-secondary details">
                                <i class="zmdi zmdi-format-list-bulleted mr-2"></i><span class="hidden-xs">Listar</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="form-horizontal">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <label class="col-sm-3 form-label" style="text-align: end">ID</label>
                                    <div class="col-sm-9 show-value">
                                        {{ $role->id }}
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 form-label" style="text-align: end">Nombre</label>
                                    <div class="col-sm-9 show-value">
                                        {{ $role->name }}
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 form-label" style="text-align: end">Permisos
                                        asignados</label>
                                    <div class="col-sm-9 show-value">
                                        @foreach ($role->permissions as $permission)
                                            <label class="badge bg-primary mx-1">{{ $permission->name }}</label>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 form-label" style="text-align: end">Protección</label>
                                    <div class="col-sm-9 show-value">
                                        {{ $role->guard_name }}
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 form-label" style="text-align: end">Fecha creada</label>
                                    <div class="col-sm-9 show-value">
                                        {{ $role->created_at }}
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 form-label" style="text-align: end">Fecha
                                        actualizada</label>
                                    <div class="col-sm-9 show-value">
                                        {{ $role->updated_at }}
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
@stop

@section('js')
    <script>
        function ask{{ $role->id }}(event) {
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
                    var form = $('#myform{{ $role->id }}');
                    form.submit();
                }
            });
        }
    </script>
@stop
