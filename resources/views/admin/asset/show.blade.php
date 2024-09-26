@extends('adminlte::page')

@section('title', 'SIS-Inventario | detalle activo')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h4><b>DETALLES DEL ACTIVO</b></h4>
        </div>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary shadow col-md-12">
                        <div class="card-header with-border">
                            <h3 class="card-title">Datos registrados del activo: <b>{{ $asset->name }}</b></h3>
                            <div class="card-tools">
                                @can('eliminar activo')
                                    <form style="display: inline" action="{{ route('asset.destroy', [$asset]) }}" method="POST"
                                        onclick="ask{{ $asset->id }}(event)" id="myform{{ $asset->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <div class="btn-group pull-right me-2">
                                            <a class="btn btn-sm btn-danger delete">
                                                <i class="fa-solid fa-trash mr-2"></i><span class="hidden-xs">Eliminar</span>
                                            </a>
                                        </div>
                                    </form>
                                @endcan
                                @can('editar activo')
                                    <div class="btn-group pull-right me-2">
                                        <a href="{{ route('asset.edit', [$asset]) }}" class="btn btn-sm btn-primary">
                                            <i class="fa-solid fa-edit mr-2"></i><span class="hidden-xs">Editar</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('listar activos')
                                    <div class="btn-group pull-right">
                                        <a href="{{ route('asset.index', []) }}" class="btn btn-sm btn-secondary">
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
                                                {{ $asset->id }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label style="text-align: end" class="col-sm-4 form-label">Código</label>
                                            <div class="col-sm-8 show-value">
                                                {{ $asset->code }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label style="text-align: end" class="col-sm-4 form-label">Nombre</label>
                                            <div class="col-sm-8 show-value">
                                                {{ $asset->name }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label style="text-align: end" class="col-sm-4 form-label">Estado</label>
                                            <div class="col-sm-8 show-value">
                                                {{ $asset->state->name }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label style="text-align: end" class="col-sm-4 form-label">Fecha
                                                agregada</label>
                                            <div class="col-sm-8 show-value">
                                                {{ $asset->admission_date }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label style="text-align: end" class="col-sm-4 form-label">Modelo</label>
                                            <div class="col-sm-8 show-value">
                                                {{ $asset->model }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label style="text-align: end" class="col-sm-4 form-label">Serie</label>
                                            <div class="col-sm-8 show-value">
                                                {{ $asset->series }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label style="text-align: end" class="col-sm-4 form-label">Categoria</label>
                                            <div class="col-sm-8 show-value">
                                                {{ $asset->category->name }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label style="text-align: end" class="col-sm-4 form-label">Ubicación</label>
                                            <div class="col-sm-8 show-value">
                                                {{ $asset->location->name }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label style="text-align: end" class="col-sm-4 form-label">Descripción</label>
                                            <div class="col-sm-8 show-value">
                                                {{ $asset->description }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label style="text-align: end" class="col-sm-4 form-label">Observaciones</label>
                                            <div class="col-sm-8 show-value">
                                                {{ $asset->observations }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label style="text-align: end" class="col-sm-4 form-label">Fecha creada</label>
                                            <div class="col-sm-8 show-value">
                                                {{ $asset->created_at }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label style="text-align: end" class="col-sm-4 form-label">Fecha
                                                actualizada</label>
                                            <div class="col-sm-8 show-value">
                                                {{ $asset->updated_at }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="row" style="text-align: center">
                                            <div class="col-sm-12 show-value">
                                                <label class="form-label mb-4">Imagen</label><br>
                                                <img src="{{ $asset->image }}" alt="Imagen" width="300">
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
@stop

@section('js')
    <script>
        function ask{{ $asset->id }}(event) {
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
                    var form = $('#myform{{ $asset->id }}');
                    form.submit();
                }
            });
        }
    </script>
@stop
