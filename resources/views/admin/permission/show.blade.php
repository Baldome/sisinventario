@extends('adminlte::page')

@section('title', 'SIS-Inventario | Detalle permiso')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h4>Detalle del permiso</h4>
        </div>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-border col-md-12">
                <div class="card-header with-border">
                    <h3 class="card-title">Datos registrados</h3>
                    <div class="card-tools">
                        <form style="display: inline" action="{{ route('permission.destroy', $permission) }}" method="POST"
                            onclick="ask{{ $permission->id }}(event)" id="myform{{ $permission->id }}">
                            @csrf
                            @method('DELETE')
                            <div class="btn-group pull-right me-2">
                                <a class="btn btn-sm btn-danger delete">
                                    <i class="zmdi zmdi-delete mr-2"></i><span class="hidden-xs">Eliminar</span>
                                </a>
                            </div>
                        </form>
                        <div class="btn-group pull-right me-2">
                            <a href="{{ route('permission.edit', $permission) }}" class="btn btn-sm btn-primary edit">
                                <i class="zmdi zmdi-edit mr-2"></i><span class="hidden-xs">Editar</span>
                            </a>
                        </div>
                        <div class="btn-group pull-right">
                            <a href="{{ route('permission.index') }}" class="btn btn-sm btn-secondary details">
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
                                    <label class="col-sm-4 form-label" style="text-align: end">ID</label>
                                    <div class="col-sm-8 show-value">
                                        {{ $permission->id }}
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-4 form-label" style="text-align: end">Nombre</label>
                                    <div class="col-sm-8 show-value">
                                        {{ $permission->name }}
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-4 form-label" style="text-align: end">Protección</label>
                                    <div class="col-sm-8 show-value">
                                        {{ $permission->guard_name }}
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-4 form-label" style="text-align: end">Fecha creada</label>
                                    <div class="col-sm-8 show-value">
                                        {{ $permission->created_at }}
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-4 form-label" style="text-align: end">Fecha
                                        actualizada</label>
                                    <div class="col-sm-8 show-value">
                                        {{ $permission->updated_at }}
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
        function ask{{ $permission->id }}(event) {
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
                    var form = $('#myform{{ $permission->id }}');
                    form.submit();
                }
            });
        }
    </script>
@stop