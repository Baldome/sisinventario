@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h4><b>DETALLES DE AL UBICACIÓN</b></h4>
        </div>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary shadow col-md-12">
                        <div class="card-header with-border">
                            <h3 class="card-title">Datos registrados de al ubicación: <b>{{ $location->name }}</b></h3>
                            <div class="card-tools">
                                @can('eliminar ubicacion')
                                    <form style="display: inline" action="{{ route('location.destroy', $location) }}"
                                        method="POST" onclick="ask{{ $location->id }}(event)" id="myform{{ $location->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <div class="btn-group pull-right me-2">
                                            <a class="btn btn-sm btn-danger delete" title="Eliminar">
                                                <i class="fa-solid fa-trash mr-2"></i><span class="hidden-xs">Eliminar</span>
                                            </a>
                                        </div>
                                    </form>
                                @endcan
                                {{-- @can('editar ubicacion')
                                    <div class="btn-group pull-right me-2">
                                        <a href="{{ route('location.edit', [$location]) }}" class="btn btn-sm btn-primary"
                                            title="Editar">
                                            <i class="fa-solid fa-edit mr-2"></i><span class="hidden-xs">Editar</span>
                                        </a>
                                    </div>
                                @endcan --}}
                                @can('listar ubicaciones')
                                    <div class="btn-group pull-right">
                                        <a href="{{ route('location.index', []) }}" class="btn btn-sm btn-secondary"
                                            title="Listar">
                                            <i class="fa-solid fa-list mr-2"></i><span class="hidden-xs">Listar</span>
                                        </a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                        <div class="form-horizontal">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <label class="col-sm-3 form-label">ID</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $location->id }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 form-label">Nombre</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $location->name }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 form-label">Descripción</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $location->description }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 form-label">Fecha creada</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $location->created_at }}
                                                {{-- <span class="badge bg-success">{{ $location->created_at }}</span> --}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 form-label">Fecha actualizada</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $location->updated_at }}
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
        function ask{{ $location->id }}(event) {
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
                    var form = $('#myform{{ $location->id }}');
                    form.submit();
                }
            });
        }
    </script>
@stop
