@extends('adminlte::page')

@section('title', 'SIS-Inventario | detalle activo')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h4><b>DETALLES DE LA HERRAMIENTA</b></h4>
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
                            <h3 class="card-title">Datos registrados de la herramienta: <b>{{ $tool->name }}</b></h3>
                            <div class="card-tools">
                                {{-- @can('prestar herramienta') --}}
                                @php
                                    $isLoaned = $tool->loans->where('isBorrowed', 1)->isNotEmpty();
                                @endphp
                                @if ($isLoaned)
                                    <div class="btn-group pull-right me-2">
                                        <span class="btn btn-sm btn-default text-red shadow"><b>Prestado</b></span>
                                    </div>
                                @else
                                    <div class="btn-group pull-right me-2">
                                        <a href="{{ route('loans.create', $tool->id) }}"
                                            class="btn btn-sm btn-warning shadow"><i
                                                class="fa-solid fa-share-from-square mr-2"></i><b>Prestar</b></a>
                                    </div>
                                @endif
                                {{-- @endcan --}}
                                {{-- @can('eliminar herramienta') --}}
                                <form style="display: inline" action="{{ route('tools.destroy', [$tool]) }}" method="POST"
                                    onclick="ask{{ $tool->id }}(event)" id="myform{{ $tool->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <div class="btn-group pull-right me-2">
                                        <a class="btn btn-sm btn-danger delete">
                                            <i class="fa-solid fa-trash mr-2"></i><span class="hidden-xs">Eliminar</span>
                                        </a>
                                    </div>
                                </form>
                                {{-- @endcan --}}
                                {{-- @can('editar activo') --}}
                                <div class="btn-group pull-right me-2">
                                    <a href="{{ route('tools.edit', [$tool]) }}" class="btn btn-sm btn-primary">
                                        <i class="fa-solid fa-edit mr-2"></i><span class="hidden-xs">Editar</span>
                                    </a>
                                </div>
                                {{-- @endcan --}}
                                {{-- @can('listar herramientas') --}}
                                <div class="btn-group pull-right">
                                    <a href="{{ route('tools.index', []) }}" class="btn btn-sm btn-secondary">
                                        <i class="fa-solid fa-list mr-2"></i><span class="hidden-xs">Listar</span>
                                    </a>
                                </div>
                                {{-- @endcan --}}
                            </div>
                        </div>
                        <div class="form-horizontal">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="row">
                                            <label style="text-align: end" class="col-sm-4 form-label">Id</label>
                                            <div class="col-sm-8 show-value">
                                                {{ $tool->id }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label style="text-align: end" class="col-sm-4 form-label">Código</label>
                                            <div class="col-sm-8 show-value">
                                                {{ $tool->code }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label style="text-align: end" class="col-sm-4 form-label">Nombre</label>
                                            <div class="col-sm-8 show-value">
                                                {{ $tool->name }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label style="text-align: end" class="col-sm-4 form-label">Estado</label>
                                            <div class="col-sm-8 show-value">
                                                {{ $tool->state->name }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label style="text-align: end" class="col-sm-4 form-label">Fecha
                                                agregada</label>
                                            <div class="col-sm-8 show-value">
                                                {{ $tool->admission_date }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label style="text-align: end" class="col-sm-4 form-label">Usuario
                                                asignado</label>
                                            <div class="col-sm-8 show-value">
                                                @if ($tool->user)
                                                    @switch($tool->user->id)
                                                        @case(1)
                                                            <span class="badge text-sm text-success">{{ $tool->user->name }}</span>
                                                        @break

                                                        @case(2)
                                                            <span class="badge text-sm text-primary">{{ $tool->user->name }}</span>
                                                        @break

                                                        @case(3)
                                                            <span class="badge text-sm text-cyan">{{ $tool->user->name }}</span>
                                                        @break

                                                        @case(4)
                                                            <span class="badge text-sm text-warning">{{ $tool->user->name }}</span>
                                                        @break

                                                        @case(5)
                                                            <span class="badge text-sm text-danger">{{ $tool->user->name }}</span>
                                                        @break

                                                        @case(6)
                                                            <span
                                                                class="badge text-sm text-secondary">{{ $tool->user->name }}</span>
                                                        @break

                                                        @case(7)
                                                            <span class="badge text-sm text-black">{{ $tool->user->name }}</span>
                                                        @break
                                                    @endswitch
                                                @else
                                                    <a href="{{ route('tools.createAssignToolToUser', $tool->id) }}"
                                                        class="btn btn-sm btn-default text-danger shadow"><i
                                                            class="fa-solid fa-share-from-square mr-2"></i>
                                                        <b>Asignar</b>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label style="text-align: end" class="col-sm-4 form-label">Unidad</label>
                                            <div class="col-sm-8 show-value">
                                                {{ $tool->unit->name }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label style="text-align: end" class="col-sm-4 form-label">Categoria</label>
                                            <div class="col-sm-8 show-value">
                                                {{ $tool->category->name }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label style="text-align: end" class="col-sm-4 form-label">Ubicación</label>
                                            <div class="col-sm-8 show-value">
                                                {{ $tool->location->name }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label style="text-align: end" class="col-sm-4 form-label">Descripción</label>
                                            <div class="col-sm-8 show-value">
                                                {{ $tool->description }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label style="text-align: end" class="col-sm-4 form-label">Observaciones</label>
                                            <div class="col-sm-8 show-value">
                                                {{ $tool->observations }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label style="text-align: end" class="col-sm-4 form-label">Fecha creada</label>
                                            <div class="col-sm-8 show-value">
                                                {{ $tool->created_at }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label style="text-align: end" class="col-sm-4 form-label">Fecha
                                                actualizada</label>
                                            <div class="col-sm-8 show-value">
                                                {{ $tool->updated_at }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 justify-content-center text-center">
                                        <div class="row justify-content-center text-center mt-3">
                                            <label for="image">Imagen Actual</label>
                                            <img src="{{ $tool->image }}" alt="Imagen del activo" width="100">
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
        function ask{{ $tool->id }}(event) {
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
                    var form = $('#myform{{ $tool->id }}');
                    form.submit();
                }
            });
        }
    </script>
@stop
