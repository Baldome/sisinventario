@extends('adminlte::page')

@section('title', 'SIS-Inventario | permisos')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h4><b>LISTADO DE PERMISOS</b></h4>
        </div>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-outline card-primary shadow col-md-12">
                <div class="card-header with-border">
                    <div class="card-tools">
                        {{-- @can('crear permiso') --}}
                        {{-- <div class="btn-group pull-right me-2">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#createPermissionModal">
                                <i class="fa-solid fa-plus mr-2"></i>Crear nuevo permiso
                            </button>
                        </div> --}}
                        {{-- @endcan --}}
                    </div>
                </div>
                <div class="card-body">
                    @php
                        $heads = ['Nro', 'Nombre', ['label' => 'Acciones', 'no-export' => true, 'width' => 16]];

                        $btnDelete = '<button class="btn btn-sm btn-default shadow text-danger" title="Eliminar">
                                      <i class="fa-solid fa-trash"></i>
                                      </button>';
                        $config = [
                            'language' => [
                                'url' => '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                            ],
                        ];
                    @endphp
                    <x-adminlte-datatable id="table" :heads="$heads" :config="$config" striped hoverable bordered
                        compressed>
                        @php
                            $counter = 0;
                        @endphp
                        @foreach ($permissions as $permission)
                            @php
                                $counter++;
                            @endphp
                            <tr>
                                <td>{{ $counter }}</td>
                                <td>{{ $permission->name }}</td>
                                <td style="text-align: center; align-content: center">
                                    @can('editar permiso')
                                        <button class="btn btn-sm btn-default shadow text-primary" data-bs-toggle="modal"
                                            data-bs-target="#editPermissionModal{{ $permission->id }}" title="Editar">
                                            <i class="fa-solid fa-edit"></i>
                                        </button>
                                    @endcan
                                    @can('eliminar permiso')
                                        <form style="display: inline" action="{{ route('permission.destroy', $permission) }}"
                                            method="post" onclick="ask{{ $permission->id }}(event)"
                                            id="myform{{ $permission->id }}">
                                            @csrf
                                            @method('DELETE')
                                            {!! $btnDelete !!}
                                        </form>
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
                                    @endcan
                                    @can('visualizar permiso')
                                        <a href="{{ route('permission.show', $permission) }}"
                                            class="btn btn-sm btn-default shadow text-teal" title="Detalles">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    @endcan
                                </td>
                            </tr>
                            <!-- Modal edit permission-->
                            <div class="modal fade" id="editPermissionModal{{ $permission->id }}" tabindex="-1"
                                aria-labelledby="editPermissionModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editPermissionModalLabel"><b>Editar permiso</b></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('permission.update', $permission) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="name">Nombre permiso</label>
                                                        <div class="form-group input-group">
                                                            <span class="input-group-text"><i
                                                                    class="fa-solid fa-user-lock"></i></span>
                                                            <input type="text" name="name" class="form-control"
                                                                placeholder="Ingrese nombre del permiso"
                                                                value="{{ $permission->name }}" required>
                                                            @error('name')
                                                                <small style="color: red">{{ $message }}</small>
                                                            @enderror
                                                        </div>
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
                            {{-- @can('principal dashboard') --}}
                            <div class="btn-group pull-right me-2">
                                <a href="{{ route('admin.index') }}" class="btn btn-sm btn-secondary">
                                    <i class="fa-solid fa-house mr-2"></i><span class="hidden-xs">Principal</span>
                                </a>
                            </div>
                            {{-- @endcan --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal create permission-->
            <div class="modal fade" id="createPermissionModal" tabindex="-1" aria-labelledby="createPermissionModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createPermissionModalLabel"><b>Crear nuevo permiso</b></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('permission.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="name">Nombre permiso</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-user-lock"></i></span>
                                            <input type="text" name="name" class="form-control"
                                                placeholder="Ingrese nombre del permiso" value="{{ old('name') }}"
                                                required>
                                        </div>
                                        @error('name')
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
