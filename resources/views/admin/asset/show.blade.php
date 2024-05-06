@extends('adminlte::page')

@section('title', 'SIS-Inventario | detalle activo')

@section('content_header')
    <h1>Detalle de la activo</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-border col-md-12">
                        <div class="card-header with-border">
                            <h3 class="card-title">Datos registrados</h3>
                            <div class="card-tools">
                                <form style="display: inline" action="{{ route('asset.destroy', [$asset]) }}" method="POST"
                                    onclick="ask{{ $asset->id }}(event)" id="myform{{ $asset->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <div class="btn-group pull-right me-2">
                                        <a class="btn btn-sm btn-danger delete" title="Eliminar">
                                            <i class="zmdi zmdi-delete mr-2"></i><span class="hidden-xs">Eliminar</span>
                                        </a>
                                    </div>
                                </form>
                                <div class="btn-group pull-right me-2">
                                    <a href="{{ route('asset.edit', [$asset]) }}" class="btn btn-sm btn-primary"
                                        title="Editar">
                                        <i class="zmdi zmdi-edit mr-2"></i><span class="hidden-xs">Editar</span>
                                    </a>
                                </div>
                                <div class="btn-group pull-right">
                                    <a href="{{ route('asset.index', []) }}" class="btn btn-sm btn-secondary"
                                        title="Listar">
                                        <i class="zmdi zmdi-format-list-bulleted mr-2"></i><span
                                            class="hidden-xs">Listar</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="form-horizontal">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <label class="col-sm-3 form-label">Imagen</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $asset->image }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 form-label">Id</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $asset->id }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 form-label">Código</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $asset->code }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 form-label">Nombre</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $asset->name }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 form-label">Estado</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $asset->state }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 form-label">Fecha agregada</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $asset->admission_date }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 form-label">Modelo</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $asset->model }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 form-label">Serie</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $asset->series }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 form-label">Categoria</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $asset->category->name }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 form-label">Ubicación</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $asset->location->name }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 form-label">Descripción</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $asset->description }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 form-label">Observaciones</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $asset->observations }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 form-label">Fecha creada</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $asset->created_at }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 form-label">Fecha actualizada</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $asset->updated_at }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
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
