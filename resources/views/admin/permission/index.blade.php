@extends('adminlte::page')

@section('title', 'SIS-Inventario | permisos')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4>Administración de permisos</h4>
        </div>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-border col-md-12">
                <div class="card-header with-border">
                    <div class="card-tools">
                        {{-- @can('crear permiso') --}}
                        <div class="btn-group pull-right me-2">
                            <a href="{{ route('permission.create') }}" class="btn btn-sm btn-primary" title="Crear">
                                <i class="zmdi zmdi-plus mr-2"></i><span class="hidden-xs">Crear</span>
                            </a>
                        </div>
                        {{-- @endcan --}}
                    </div>
                </div>
                <div class="card-body">
                    @php
                        $heads = ['Nro', 'Nombre', ['label' => 'Acciones', 'no-export' => true, 'width' => 18]];

                        $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar">
                                      <i class="fa fa-lg fa-fw fa-trash"></i>
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
                                <td>
                                    {{-- @can('editar permiso') --}}
                                    <a href="{{ route('permission.edit', $permission) }}"
                                        class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                    </a>
                                    {{-- @endcan
                                    @can('eliminar permiso') --}}
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
                                    {{-- @endcan
                                    @can('visualizar permiso') --}}
                                    <a href="{{ route('permission.show', $permission) }}"
                                        class="btn btn-xs btn-default text-teal mx-1 shadow" title="Detalles">
                                        <i class="fa fa-lg fa-fw fa-eye"></i>
                                    </a>
                                    {{-- @endcan --}}
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
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
