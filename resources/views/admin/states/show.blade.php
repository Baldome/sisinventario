@extends('adminlte::page')

@section('title', 'SIS-Inventario | detalle estado')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h4><b>DETALLES DE LA ESTADO</b></h4>
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
                            <h3 class="card-title">Datos registrados del estado: <b>{{ $state->name }}</b> </h3>
                            <div class="card-tools">
                                @can('eliminar estado')
                                    <form style="display: inline" action="{{ route('states.destroy', $state) }}"
                                        method="POST" onclick="ask{{ $state->id }}(event)" id="myform{{ $state->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <div class="btn-group pull-right me-2">
                                            <a class="btn btn-sm btn-danger delete" title="Eliminar">
                                                <i class="fa-solid fa-trash mr-2"></i><span class="hidden-xs">Eliminar</span>
                                            </a>
                                        </div>
                                    </form>
                                @endcan
                                {{-- @can('editar estado')
                                    <button class="btn btn-sm shadow btn-default text-primary" data-bs-toggle="modal"
                                        data-bs-target="#editstateModal{{ $state->id }}" title="Editar">
                                        <i class="fa-solid fa-edit"></i>
                                    </button>
                                @endcan --}}
                                @can('listar estados')
                                    <div class="btn-group pull-right">
                                        <a href="{{ route('states.index') }}" class="btn btn-sm btn-secondary" title="Listar">
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
                                                {{ $state->id }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 form-label">Nombre</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $state->name }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 form-label">Descripción</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $state->description }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 form-label">Fecha creada</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $state->created_at }}
                                                {{-- <span class="badge bg-success">{{ $state->created_at }}</span> --}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 form-label">Fecha actualizada</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $state->updated_at }}
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
    <!-- Modal edit state-->
    <div class="modal fade" id="editstateModal{{ $state->id }}" tabindex="-1"
        aria-labelledby="editstateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editstateModalLabel"><b>Editar estado</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('states.update', $state) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="name">Nombre estado</label>
                                <div class="form-group input-group">
                                    <span class="input-group-text"><i class="fa-solid fa-user-lock"></i></span>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Ingrese nombre del estado" value="{{ $state->name }}" required>
                                    @error('name')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="description">Descripción</label>
                                <div class="form-group input-group">
                                    <span class="input-group-text"><i class="fa-solid fa-file-lines"></i></span>
                                    <textarea class="form-control" name="description" id="description" rows="5">{{ $state->description }}</textarea>
                                </div>
                                @error('description')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="btn-group pull-right me-2">
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        <i class="fa-solid fa-pen-to-square mr-2"></i><span
                                            class="hidden-xs">Actualizar</span>
                                    </button>
                                </div>
                                <div class="btn-group pull-right me-2">
                                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i
                                            class="fa-solid fa-ban mr-2"></i>Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
    <script>
        function ask{{ $state->id }}(event) {
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
                    var form = $('#myform{{ $state->id }}');
                    form.submit();
                }
            });
        }
    </script>
@stop