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
            <div class="card card-border col-md-12">
                <div class="card-header">
                    <span
                        class="text-lg"><b>{{ Auth::user()->hasRole('Administrador') ? 'Todas las Herramientas' : 'Mis Herramientas' }}</b></span>
                    <div class="card-tools">
                        {{-- @can('crear activo') --}}
                        <div class="btn-group pull-right me-2">
                            <a href="{{ route('tools.create') }}" class="btn btn-sm btn-primary">
                                <i class="fa-solid fa-plus mr-2"></i><span class="hidden-xs">Crear nueva herramienta</span>
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
                            auth()->user()->can('ver herramientas asignados') ? 'Usuario asignado' : null,
                            'Estado',
                            'Unidad',
                            'Categoria',
                            'Ubicación',
                            ['label' => 'Acciones', 'no-export' => true, 'width' => 16],
                        ];
                        $heads = array_filter($heads);
                        $btnDelete = '<button class="btn btn-xs btn-default text-danger shadow" title="Eliminar">
                                      <i class="fa fa-lg fa-fw fa-trash"></i>
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
                                        <img src="{{ $tool->image }}" alt="{{ $tool->name }}" width="50px">
                                    </span>
                                </td>
                                <td>{{ $tool->code }}</td>
                                <td>{{ $tool->name }}</td>
                                @can('ver herramientas asignados')
                                    <td style="text-align: center; align-content: center">
                                        @if ($tool->user)
                                            @switch($tool->user->role_id)
                                                @case(1)
                                                    <span class="badge text-sm bg-success">{{ $tool->user->name }}</span>
                                                @break

                                                @case(2)
                                                    <span class="badge text-sm bg-primary">{{ $tool->user->name }}</span>
                                                @break

                                                @case(3)
                                                    <span class="badge text-sm bg-cyan">{{ $tool->user->name }}</span>
                                                @break

                                                @case(4)
                                                    <span class="badge text-sm bg-warning">{{ $tool->user->name }}</span>
                                                @break

                                                @case(5)
                                                    <span class="badge text-sm bg-info">{{ $tool->user->name }}</span>
                                                @break

                                                @case(6)
                                                    <span class="badge text-sm bg-secondary">{{ $tool->user->name }}</span>
                                                @break

                                                @case(7)
                                                    <span class="badge text-sm bg-light">{{ $tool->user->name }}</span>
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
                                <td>{{ $tool->state }}</td>
                                <td>{{ $tool->unit->name }}</td>
                                <td>{{ $tool->category->name }}</td>
                                <td>{{ $tool->location->name }}</td>
                                <td style="text-align: center; align-content: center">
                                    @if ($isLoaned)
                                        <span class="btn btn-xs btn-default text-red shadow"><b>Prestado</b></span>
                                    @else
                                        <a href="{{ route('loans.create', $tool->id) }}"
                                            class="btn btn-xs btn-default text-warning shadow"><i
                                                class="fa-solid fa-share-from-square mr-2"></i><b>Prestar</b></a>
                                    @endif
                                    <a href="{{ route('tools.edit', $tool) }}"
                                        class="btn btn-xs btn-default text-primary shadow" title="Editar">
                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                    </a>
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
                                    <a href="{{ route('tools.show', [$tool]) }}"
                                        class="btn btn-xs btn-default text-teal shadow" title="Detalles">
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
@stop

@section('css')
@stop

@section('js')
@stop
