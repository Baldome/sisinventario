@extends('adminlte::page')

@section('title', 'SIS-Inventario | unidades')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4><b>ADMINISTRACIÓN DE UNIDADES</b></h4>
        </div>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-outline card-primary shadow col-md-12">
                <div class="card-header with-border">
                    <div class="card-tools">
                        {{-- @can('crear unidad') --}}
                        <div class="btn-group pull-right me-2">
                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#createUnitModal">
                                <i class="fa-solid fa-plus mr-2"></i>Crear nueva unidad
                            </button>
                        </div>
                        {{-- @endcan --}}
                    </div>
                </div>
                <div class="card-body">
                    @php
                        $heads = [
                            '#',
                            'Nombre',
                            'Descripción',
                            ['label' => 'Acciones', 'no-export' => true, 'width' => 14],
                        ];
                        $btnDelete = '<button class="btn btn-sm shadow btn-default text-danger" title="Eliminar">
                                      <i class="fa-solid fa-trash"></i>
                                      </button>';
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
                        @foreach ($units as $unit)
                            @php
                                $counter++;
                            @endphp
                            <tr>
                                <td>{{ $counter }}</td>
                                <td>{{ $unit->name }}</td>
                                <td>{{ $unit->description }}</td>
                                <td style="text-align: center; align-content: center">
                                    @can('editar unidad')
                                        <button class="btn btn-sm shadow btn-default text-primary" data-bs-toggle="modal"
                                            data-bs-target="#editUnitModal{{ $unit->id }}" title="Editar">
                                            <i class="fa-solid fa-edit"></i>
                                        </button>
                                    @endcan
                                    @can('eliminar unidad')
                                        <form style="display: inline" action="{{ route('units.destroy', $unit) }}"
                                            method="post" onclick="ask{{ $unit->id }}(event)"
                                            id="myform{{ $unit->id }}">
                                            @csrf
                                            @method('DELETE')
                                            {!! $btnDelete !!}
                                        </form>
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
                                    @endcan
                                    @can('visualizar unidad')
                                        <a href="{{ route('units.show', $unit) }}"
                                            class="btn btn-sm shadow btn-default text-teal" title="Detalles">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    @endcan
                                </td>
                            </tr>
                            <!-- Modal edit unit-->
                            <div class="modal fade" id="editUnitModal{{ $unit->id }}" tabindex="-1"
                                aria-labelledby="editunitModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editunitModalLabel"><b>Editar unidad</b></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('units.update', $unit) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label for="name">Nombre unidad</label>
                                                        <div class="form-group input-group">
                                                            <span class="input-group-text"><i
                                                                    class="fa-solid fa-user-lock"></i></span>
                                                            <input type="text" name="name" class="form-control"
                                                                placeholder="Ingrese nombre del unidad"
                                                                value="{{ $unit->name }}" required>
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
                                                            <textarea class="form-control" name="description" id="description" rows="5">{{ $unit->description }}</textarea>
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
            <!-- Modal create unit-->
            <div class="modal fade" id="createUnitModal" tabindex="-1" aria-labelledby="createUnitModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createUnitModalLabel"><b>Crear nuevo unidad</b></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <form action="{{ route('units.store') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="name">Nombre unidad</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-user-lock"></i></span>
                                            <input type="text" name="name" class="form-control"
                                                placeholder="Ingrese nombre del unidad" value="{{ old('name') }}"
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
