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
            <div class="card-tools">
                {{-- @can('crear activo') --}}
                    <div class="btn-group pull-right me-2">
                        <a href="{{ route('asset.create', []) }}" class="btn btn-sm btn-primary" title="Crear">
                            <i class="zmdi zmdi-plus mr-2"></i><span class="hidden-xs">Crear</span>
                        </a>
                    </div>
                {{-- @endcan --}}
            </div>
        </div>
        <div class="card-body">
            @php
                $heads = [
                    'Nro',
                    'Imagen',
                    'Código',
                    'Nombre',
                    'Estado',
                    'Categoria',
                    'Ubicación',
                    ['label' => 'Acciones', 'no-export' => true, 'width' => 15],
                ];
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
                        <td>{{ $asset->state }}</td>
                        <td>{{ $asset->category->name }}</td>
                        <td>{{ $asset->location->name }}</td>
                        <td><a href="{{ route('asset.edit', [$asset]) }}"
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
                        <a href="{{ route('dashboard') }}" class="btn btn-sm btn-secondary">
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
