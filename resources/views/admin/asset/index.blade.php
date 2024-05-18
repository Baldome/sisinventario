@extends('adminlte::page')

@section('title', 'SIS-Inventario | Activos')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4>Administración de Activos</h4>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <span
                class="text-bg-dark text-lg">{{ Auth::user()->hasRole('Administrador') ? 'Todos los Activos' : 'Mis Activos' }}</span>
            <div class="card-tools">
                {{-- @can('crear activo') --}}
                <div class="btn-group pull-right me-2">
                    <a href="{{ route('asset.create') }}" class="btn btn-sm btn-primary" title="Crear">
                        <i class="zmdi zmdi-plus mr-2"></i><span class="hidden-xs">Crear</span>
                    </a>
                </div>
                {{-- @endcan --}}
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
                    ['label' => 'Acciones', 'no-export' => true, 'width' => 16],
                ];
                $heads = array_filter($heads); // Eliminar elementos nulos
                $btnEdit = '';
                $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
              </button>';
                $btnDetails = '';
                $config = [
                    'language' => [
                        'url' => '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                    ],
                ];
            @endphp
            <x-adminlte-datatable id="table7" :heads="$heads" head-theme="light" :config="$config" striped hoverable
                bordered compressed>
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
                                <img src="{{ $asset->image }}" alt="{{ $asset->name }}" width="50px">
                            </span>
                        </td>
                        <td>{{ $asset->code }}</td>
                        <td>{{ $asset->name }}</td>
                        @can('ver activos asignados')
                            <td>
                                @if ($asset->user)
                                    @if ($asset->user->role_id === 1)
                                        <span class="badge text-sm bg-success">{{ $asset->user->name }}</span>
                                    @endif
                                    @if ($asset->user->role_id === 2)
                                        <span class="badge text-sm bg-primary">{{ $asset->user->name }}</span>
                                    @endif
                                    @if ($asset->user->role_id === 3)
                                        <span class="badge text-sm bg-cyan">{{ $asset->user->name }}</span>
                                    @endif
                                    @if ($asset->user->role_id === 4)
                                        <span class="badge text-sm bg-warning">{{ $asset->user->name }}</span>
                                    @endif
                                    @if ($asset->user->role_id === 5)
                                        <span class="badge text-sm bg-info">{{ $asset->user->name }}</span>
                                    @endif
                                    @if ($asset->user->role_id === 6)
                                        <span class="badge text-sm bg-secondary">{{ $asset->user->name }}</span>
                                    @endif
                                    @if ($asset->user->role_id === 7)
                                        <span class="badge text-sm bg-light">{{ $asset->user->name }}</span>
                                    @endif
                                @else
                                    <span class="badge text-sm bg-danger">Sin asignar</span>
                                @endif
                            </td>
                        @endcan
                        <td>{{ $asset->state }}</td>
                        <td>{{ $asset->category->name }}</td>
                        <td>{{ $asset->location->name }}</td>
                        <td>
                            @if ($asset->user)
                                <span class="badge text-xs bg-success" title="Asignado">
                                    <i class="fa fa-lg fa-check"></i>
                                </span>
                            @else
                                <a href="{{ route('asset.createAssignAssetToUser') }}"
                                    class="btn btn-xs btn-default text-warning mx-1 shadow" title="Asignar activo">
                                    <i class="fa fa-lg fa-fw fa-share" aria-hidden="true"></i>
                                </a>
                            @endif
                            <a href="{{ route('asset.edit', $asset) }}"
                                class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </a>
                            <form style="display: inline" action="{{ route('asset.destroy', [$asset]) }}" method="post"
                                onclick="ask{{ $asset->id }}(event)" id="myform{{ $asset->id }}">
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
                            <a href="{{ route('asset.show', [$asset]) }}"
                                class="btn btn-xs btn-default text-teal mx-1 shadow" title="Detalles">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </a>
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
                            <i class="zmdi zmdi-menu mr-2"></i><span class="hidden-xs">Principal</span>
                        </a>
                    </div>
                    {{-- @endcan --}}
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
