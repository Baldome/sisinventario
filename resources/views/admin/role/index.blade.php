@extends('adminlte::page')

@section('title', 'SIS-Inventario | Roles')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h4><b>ADMINISTRACIÓN DE ROLES</b></h4>
        </div>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-outline card-primary shadow col-md-12">
                <div class="card-header with-border">
                    <div class="card-tools">
                        @can('crear rol')
                            <div class="btn-group pull-right me-2">
                                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#createRoleModal">
                                    <i class="fa-solid fa-plus mr-2"></i>Crear nuevo rol
                                </button>
                            </div>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    @php
                        $heads = [
                            '#',
                            'Nombre',
                            'Permisos',
                            ['label' => 'Acciones', 'no-export' => true, 'width' => 18],
                        ];

                        $btnDelete = '<button class="btn btn-sm btn-default shadow text-danger mx-1" title="Eliminar">
                                      <i class="fa-solid fa-trash"></i>
                                      </button>';
                        $config = [
                            'language' => [
                                'url' => '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                            ],
                        ];
                    @endphp
                    <x-adminlte-datatable id="table" :heads="$heads" :config="$config" striped hoverable bordered
                        compressed with-buttons>
                        @php
                            $counter = 0;
                        @endphp
                        @foreach ($roles as $role)
                            @php
                                $counter++;
                            @endphp
                            <tr>
                                <td>{{ $counter }}</td>
                                <td>{{ $role->name }}</td>
                                <td class="text-center">
                                    @can('ver permisos asignados')
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#permissionsModal{{ $role->id }}">
                                            <i class="fa-solid fa-eye mr-2"></i>Ver permisos
                                        </button>
                                    @endcan
                                </td>
                                <td style="text-align: center; align-content: center">
                                    @can('editar rol')
                                        <button class="btn btn-sm btn-default shadow text-primary" data-bs-toggle="modal"
                                            data-bs-target="#editRoleModal{{ $role->id }}" title="Editar">
                                            <i class="fa-solid fa-edit"></i>
                                        </button>
                                    @endcan
                                    @can('eliminar rol')
                                        <form style="display: inline" action="{{ route('role.destroy', $role) }}" method="post"
                                            onclick="ask{{ $role->id }}(event)" id="myform{{ $role->id }}">
                                            @csrf
                                            @method('DELETE')
                                            {!! $btnDelete !!}
                                        </form>
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
                                    @endcan
                                    @can('visualizar rol')
                                        <a href="{{ route('role.show', $role) }}"
                                            class="btn btn-sm btn-default shadow text-teal" title="Detalles">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    @endcan
                                </td>
                            </tr>
                            <!-- Modal permissions-->
                            <div class="modal fade" id="permissionsModal{{ $role->id }}" tabindex="-1"
                                aria-labelledby="permissionsModalLabel{{ $role->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="permissionsModalLabel{{ $role->id }}">Permisos
                                                del rol: <b>{{ $role->name }}</b></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            @if ($role->permissions->isEmpty())
                                                <p>No hay permisos asignados a este rol.</p>
                                            @else
                                                @foreach ($role->permissions as $permission)
                                                    <p class="badge text-sm bg-primary m-1">{{ $permission->name }}</p>
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            @can('asignar permisos al rol')
                                                <a href="{{ url('admin/role/' . $role->id . '/assign-permissions-to-role') }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="fa-solid fa-share mr-2" aria-hidden="true"></i>Asignar Permisos
                                                </a>
                                            @endcan
                                            <button type="button" class="btn btn-secondary btn-sm"
                                                data-bs-dismiss="modal"><i class="fa-solid fa-ban mr-2"></i>Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal edit role-->
                            <div class="modal fade" id="editRoleModal{{ $role->id }}" tabindex="-1"
                                aria-labelledby="editRoleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editRoleModalLabel"><b>Editar rol</b></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('role.update', $role) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="name">Nombre rol</label>
                                                        <div class="form-group input-group">
                                                            <span class="input-group-text"><i
                                                                    class="fa-solid fa-user-lock"></i></span>
                                                            <input type="text" name="name" class="form-control"
                                                                placeholder="Ingrese nombre del rol"
                                                                value="{{ $role->name }}" required>
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
                            <div class="btn-group pull-right me-2">
                                <a href="{{ route('admin.index') }}" class="btn btn-sm btn-secondary" title="Principal">
                                    <i class="fa-solid fa-house mr-2"></i><span class="hidden-xs">Principal</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal create role-->
            <div class="modal fade" id="createRoleModal" tabindex="-1" aria-labelledby="createRoleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createRoleModalLabel"><b>Crear nuevo rol</b></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('role.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="name">Nombre rol</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-user-lock"></i></span>
                                            <input type="text" name="name" class="form-control"
                                                placeholder="Ingrese nombre del rol" value="{{ old('name') }}"
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
