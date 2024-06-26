@extends('adminlte::page')

@section('title', 'SIS-Inventario | detalle unidad')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h4><b>DETALLES DE LA UNIDAD</b></h4>
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
                            <h3 class="card-title">Datos registrados de la unidad: <b>{{ $unit->name }}</b> </h3>
                            <div class="card-tools">
                                @can('elimar unidad')
                                    <form style="display: inline" action="{{ route('units.destroy', $unit) }}" method="POST"
                                        onclick="ask{{ $unit->id }}(event)" id="myform{{ $unit->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <div class="btn-group pull-right me-2">
                                            <a class="btn btn-sm btn-danger delete" title="Eliminar">
                                                <i class="fa-solid fa-trash mr-2"></i><span class="hidden-xs">Eliminar</span>
                                            </a>
                                        </div>
                                    </form>
                                @endcan
                                {{-- @can('editar unidad')
                                    <div class="btn-group pull-right me-2">
                                        <a href="{{ route('units.edit', [$unit]) }}" class="btn btn-sm btn-primary"
                                            title="Editar">
                                            <i class="fa-solid fa-edit mr-2"></i><span class="hidden-xs">Editar</span>
                                        </a>
                                    </div>
                                @endcan --}}
                                @can('listar unidades')
                                    <div class="btn-group pull-right">
                                        <a href="{{ route('units.index') }}" class="btn btn-sm btn-secondary" title="Listar">
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
                                                {{ $unit->id }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 form-label">Nombre</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $unit->name }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 form-label">Descripción</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $unit->description }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 form-label">Fecha creada</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $unit->created_at }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 form-label">Fecha actualizada</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $unit->updated_at }}
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
        function ask{{ $unit->id }}(event) {
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
                    var form = $('#myform{{ $unit->id }}');
                    form.submit();
                }
            });
        }
    </script>
@stop
