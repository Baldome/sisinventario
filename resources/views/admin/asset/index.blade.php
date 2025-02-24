@extends('adminlte::page')

@section('title', 'SIS-Inventario | Activos')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h4><b>ADMINISTRACIÓN DE ACTIVOS</b></h4>
        </div>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-outline card-primary shadow col-md-12">
                <div class="card-header">
                    <span
                        class="text-lg"><b>{{ Auth::user()->hasRole('Administrador') ? 'Todos los Activos' : 'Mis Activos' }}</b></span>
                    <div class="card-tools">
                        @can('importar activos')
                            <div class="btn-group pull-right me-2">
                                <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal"
                                    data-bs-target="#importAssetModal">
                                    <i class="fa-solid fa-file-import mr-2"></i>Importar
                                </button>
                            </div>
                        @endcan
                        @can('crear activo')
                            <div class="btn-group pull-right me-2">
                                <a href="{{ route('asset.create') }}" class="btn btn-sm btn-primary">
                                    <i class="fa-solid fa-plus mr-2"></i><span class="hidden-xs">Crear nuevo activo</span>
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
                            auth()->user()->can('ver activos asignados') ? 'Usuario asignado' : null,
                            'Estado',
                            'Categoria',
                            'Ubicación',
                            ['label' => 'Acciones', 'no-export' => true, 'width' => 10],
                        ];
                        $heads = array_filter($heads); // Eliminar elementos nulos
                        $btnDelete = '<button class="btn btn-sm btn-default text-danger shadow" title="Eliminar">
                                        <i class="fa-solid fa-trash"></i></button>';
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
                        @foreach ($assets as $asset)
                            @php
                                $counter++;
                            @endphp
                            <tr>
                                <td>{{ $counter }}</td>
                                <td><span class="bg-light inline rounded-circle user-image">
                                        <img src="{{ $asset->image }}" alt="{{ $asset->id }}" width="50px">
                                    </span>
                                </td>
                                <td>{{ $asset->code }}</td>
                                <td>{{ $asset->name }}</td>
                                @can('ver activos asignados')
                                    <td style="text-align: center; align-content: center">
                                        @if ($asset->user)
                                            @if ($asset->user->id === 1)
                                                <span class="badge text-sm text-success">{{ $asset->user->name }}</span>
                                            @endif
                                            @if ($asset->user->id === 2)
                                                <span class="badge text-sm text-primary">{{ $asset->user->name }}</span>
                                            @endif
                                            @if ($asset->user->id === 3)
                                                <span class="badge text-sm text-cyan">{{ $asset->user->name }}</span>
                                            @endif
                                            @if ($asset->user->id === 4)
                                                <span class="badge text-sm text-warning">{{ $asset->user->name }}</span>
                                            @endif
                                            @if ($asset->user->id === 5)
                                                <span class="badge text-sm text-danger">{{ $asset->user->name }}</span>
                                            @endif
                                            @if ($asset->user->id === 6)
                                                <span class="badge text-sm text-secondary">{{ $asset->user->name }}</span>
                                            @endif
                                            @if ($asset->user->id === 7)
                                                <span class="badge text-sm text-black">{{ $asset->user->name }}</span>
                                            @endif
                                        @else
                                            <a href="{{ url('admin/asset/' . $asset->id . '/assign-asset-to-user') }}"
                                                class="btn btn-sm btn-success shadow" title="Asignar activo">
                                                <i class="fa-solid fa-share mr-2" aria-hidden="true"></i><b>Asignar</b>
                                            </a>
                                        @endif
                                    </td>
                                @endcan
                                <td>{{ $asset->state->name }}</td>
                                <td>{{ $asset->category->name }}</td>
                                <td>{{ $asset->location->name }}</td>
                                <td style="text-align: center; align-content: center">
                                    @can('editar activo')
                                        <a href="{{ route('asset.edit', $asset) }}"
                                            class="btn btn-sm btn-default text-primary shadow" title="Editar">
                                            <i class="fa-solid fa-edit"></i>
                                        </a>
                                    @endcan
                                    @can('eliminar activo')
                                        <form style="display: inline" action="{{ route('asset.destroy', [$asset]) }}"
                                            method="post" onclick="ask{{ $asset->id }}(event)"
                                            id="myform{{ $asset->id }}">
                                            @csrf
                                            @method('DELETE')
                                            {!! $btnDelete !!}
                                        </form>
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
                                    @endcan
                                    @can('visualizar activo')
                                        <a href="{{ route('asset.show', [$asset]) }}"
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
    <!-- Modal import assets-->
    <div class="modal fade" id="importAssetModal" tabindex="-1" aria-labelledby="importAssetModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importAssetModalLabel"><b>Importar activos</b></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('asset.import') }}" method="POST" enctype="multipart/form-data">
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
