@extends('adminlte::page')

@section('title', 'SIS-Inventario | Estados')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4><b>ADMINISTRACIÓN DE ESTADOS</b></h4>
        </div>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-outline card-primary shadow col-md-12">
                <div class="card-header with-border">
                    <div class="card-tools">
                        @can('crear estado')
                            <div class="btn-group pull-right me-2">
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#createStateModal">
                                    <i class="fa-solid fa-plus mr-2"></i>Crear nuevo estado
                                </button>
                            </div>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    @php
                        $heads = [
                            'Nro',
                            'Nombre',
                            'Descripción',
                            ['label' => 'Acciones', 'no-export' => true, 'width' => 14],
                        ];
                        $btnDelete = '<button class="btn btn-sm shadow btn-default text-danger" title="Eliminar">
                                      <i class="fa-solid fa-trash"></i>
                                      </button>';
                        $btnDetails = '';
                        $config = [
                            'language' => [
                                'url' => '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                            ],
                        ];
                    @endphp
                    <x-adminlte-datatable id="table7" :heads="$heads" head-theme="light" :config="$config" striped
                        hoverable bordered compressed with-buttons>
                        @php
                            $counter = 0;
                        @endphp
                        @foreach ($states as $state)
                            @php
                                $counter++;
                            @endphp
                            <tr>
                                <td>{{ $counter }}</td>
                                <td>{{ $state->name }}</td>
                                <td>{{ $state->description }}</td>
                                <td style="text-align: center; align-content: center">
                                    @can('editar categoria')
                                        <button class="btn btn-sm shadow btn-default text-primary" data-bs-toggle="modal"
                                            data-bs-target="#editstateModal{{ $state->id }}" title="Editar">
                                            <i class="fa-solid fa-edit"></i>
                                        </button>
                                    @endcan
                                    @can('eliminar categoria')
                                        <form style="display: inline" action="{{ route('states.destroy', $state) }}"
                                            method="post" onclick="ask{{ $state->id }}(event)"
                                            id="myform{{ $state->id }}">
                                            @csrf
                                            @method('DELETE')
                                            {!! $btnDelete !!}
                                        </form>
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
                                    @endcan
                                    @can('visualizar categoria')
                                        <a href="{{ route('states.show', $state) }}"
                                            class="btn btn-sm shadow btn-default text-teal" title="Detalles">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    @endcan
                                </td>
                            </tr>
                            <!-- Modal edit state-->
                            <div class="modal fade" id="editstateModal{{ $state->id }}" tabindex="-1"
                                aria-labelledby="editstateModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editstateModalLabel"><b>Editar estado</b></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('states.update', $state) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="name">Nombre estado</label>
                                                        <div class="form-group input-group">
                                                            <span class="input-group-text"><i
                                                                    class="fa-solid fa-user-lock"></i></span>
                                                            <input type="text" name="name" class="form-control"
                                                                placeholder="Ingrese nombre del estado"
                                                                value="{{ $state->name }}" required>
                                                            @error('name')
                                                                <small style="color: red">{{ $message }}</small>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="description">Descripción</label>
                                                        <div class="form-group input-group">
                                                            <span class="input-group-text"><i
                                                                    class="fa-solid fa-file-lines"></i></span>
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
                                                            <button type="button" class="btn btn-secondary btn-sm"
                                                                data-bs-dismiss="modal"><i
                                                                    class="fa-solid fa-ban mr-2"></i>Cancelar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </x-adminlte-datatable>
                </div>
                <div class="card-footer bg-transparent">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="btn-group pull-right me-2">
                                <a href="{{ route('admin.index') }}" class="btn btn-sm btn-secondary" title="Principal">
                                    <i class="fa-solid fa-house mr-2"></i><span class="hidden-xs">Principal</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal create state-->
            <div class="modal fade" id="createStateModal" tabindex="-1" aria-labelledby="createStateModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createStateModalLabel"><b>Crear nuevo estado</b></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('states.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="name">Nombre estado</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-user-lock"></i></span>
                                            <input type="text" name="name" class="form-control"
                                                placeholder="Ingrese nombre del estado" value="{{ old('name') }}"
                                                required>
                                        </div>
                                        @error('name')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-12">
                                        <label for="description">Descripción</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-file-lines"></i></span>
                                            <textarea class="form-control" name="description" id="description" rows="5"
                                                placeholder="Ingrese su descripción">{{ old('name') }}</textarea>
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
                                                <i class="fa-solid fa-save mr-2"></i><span
                                                    class="hidden-xs">Guardar</span>
                                            </button>
                                        </div>
                                        <div class="btn-group pull-right me-2">
                                            <button type="button" class="btn btn-secondary btn-sm"
                                                data-bs-dismiss="modal"><i
                                                    class="fa-solid fa-ban mr-2"></i>Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        input:invalid {
            border-color: red;
        }

        select:invalid {
            border-color: red;
        }
    </style>
@stop

@section('js')
@stop
