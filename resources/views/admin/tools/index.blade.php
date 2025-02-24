@extends('adminlte::page')

@section('title', 'SIS-Inventario | Herramientas')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h4><b>ADMINISTRACIÓN DE HERRAMIENTAS</b></h4>
        </div>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-outline card-primary shadow col-md-12">
                <div class="card-header">
                    <span
                        class="text-lg"><b>{{ Auth::user()->hasRole('Administrador') ? 'Todas las Herramientas' : 'Mis Herramientas' }}</b></span>
                    <div class="card-tools">
                        @can('importar herramientas')
                            <div class="btn-group pull-right me-2">
                                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                    data-bs-target="#importToolModal">
                                    <i class="fa-solid fa-file-import mr-2"></i>Importar
                                </button>
                            </div>
                        @endcan
                        @can('crear herramienta')
                            <div class="btn-group pull-right me-2">
                                <a href="{{ route('tools.create') }}" class="btn btn-sm btn-primary">
                                    <i class="fa-solid fa-plus mr-2"></i><span class="hidden-xs">Crear nueva herramienta</span>
                                </a>
                            </div>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    @php
                        $heads = [
                            '#',
                            'Imagen',
                            'Código',
                            'Nombre',
                            auth()->user()->can('ver herramientas asignados') ? 'Usuario asignado' : null,
                            'Estado',
                            'Unidad',
                            'Categoria',
                            'Ubicación',
                            ['label' => 'Acciones', 'no-export' => true, 'width' => 18],
                        ];
                        $heads = array_filter($heads);
                        $btnDelete = '<button class="btn btn-sm btn-default text-danger shadow" title="Eliminar">
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
                        @foreach ($tools as $tool)
                            @php
                                $counter++;
                                $isLoaned = $tool->loans->where('isBorrowed', 1)->isNotEmpty();
                            @endphp
                            <tr>
                                <td>{{ $counter }}</td>
                                <td><span class="bg-light inline rounded-circle user-image">
                                        <img src="{{ $tool->image }}" alt="{{ $tool->code }}" width="50px">
                                    </span>
                                </td>
                                <td>{{ $tool->code }}</td>
                                <td>{{ $tool->name }}</td>
                                @can('ver herramientas asignados')
                                    <td style="text-align: center; align-content: center">
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
                                                    <span class="badge text-sm text-secondary">{{ $tool->user->name }}</span>
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
                                    </td>
                                @endcan
                                <td>{{ $tool->state->name }}</td>
                                <td>{{ $tool->unit->name }}</td>
                                <td>{{ $tool->category->name }}</td>
                                <td>{{ $tool->location->name }}</td>
                                <td style="text-align: center; align-content: center">
                                    @if ($isLoaned)
                                        <span class="btn btn-sm btn-default text-red shadow"><b>Prestado</b></span>
                                    @else
                                        @can('crear prestamo')
                                            <a href="{{ route('loans.create', $tool->id) }}"
                                                class="btn btn-sm btn-default text-warning shadow"><i
                                                    class="fa-solid fa-share-from-square mr-2"></i><b>Prestar</b></a>
                                        @endcan
                                    @endif
                                    @can('editar herramienta')
                                        <a href="{{ route('tools.edit', $tool) }}"
                                            class="btn btn-sm btn-default text-primary shadow" title="Editar">
                                            <i class="fa-solid fa-edit"></i>
                                        </a>
                                    @endcan
                                    @can('eliminar herramienta')
                                        <form style="display: inline" action="{{ route('tools.destroy', [$tool]) }}"
                                            method="post" onclick="ask{{ $tool->id }}(event)"
                                            id="myform{{ $tool->id }}">
                                            @csrf
                                            @method('DELETE')
                                            {!! $btnDelete !!}
                                        </form>
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
                                    @endcan
                                    @can('visualizar herramienta')
                                        <a href="{{ route('tools.show', [$tool]) }}"
                                            class="btn btn-sm btn-default text-teal shadow" title="Detalles">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>
                                    @endcan
                                </td>
                            </tr>
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
        </div>
    </div>
    <!-- Modal import tools-->
    <div class="modal fade" id="importToolModal" tabindex="-1" aria-labelledby="importToolModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importToolModalLabel"><b>Importar herramientas</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('tools.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            @if (isset($errors) && $errors->any())
                                <div class="alert alert-danger" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="col-md-12">
                                <div class="form-group input-group">
                                    <span class="input-group-text"><i class="fa-solid fa-file-excel"></i></span>
                                    <input type="file" name="import_file" class="form-control"
                                        value="{{ old('import_file') }}" required>
                                </div>
                                @error('import_file')
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
                                        <i class="fa-solid fa-file-import mr-2"></i><span class="hidden-xs">Importar</span>
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
@stop
