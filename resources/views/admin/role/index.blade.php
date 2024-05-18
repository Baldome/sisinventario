@extends('adminlte::page')

@section('title', 'SIS-Inventario | Roles')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4>Administración de roles</h4>
        </div>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-border col-md-12">
                <div class="card-header with-border">
                    <div class="card-tools">
                        <div class="btn-group pull-right me-2">
                            <a href="{{ route('role.create') }}" class="btn btn-sm btn-primary">
                                <i class="zmdi zmdi-plus mr-2"></i><span class="hidden-xs">Crear</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @php
                        $heads = [
                            'Nro',
                            'Nombre',
                            ['label' => 'Permisos', 'no-export' => true, 'width' => 50],
                            ['label' => 'Acciones', 'no-export' => true, 'width' => 16],
                        ];

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
                        @foreach ($roles as $role)
                            @php
                                $counter++;
                            @endphp
                            <tr>
                                <td>{{ $counter }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @foreach ($role->permissions as $permission)
                                        <span class="badge bg-primary mx-1">{{ $permission->name }}</span>
                                    @endforeach
                                </td>
                                <td><a href="{{ url('admin/role/' . $role->id . '/assign-permissions-to-role') }}"
                                        class="btn btn-xs btn-default text-warning mx-1 shadow" title="Asignar Permisos">
                                        <i class="fa fa-lg fa-fw fa-share" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('role.edit', $role) }}"
                                        class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                                        <i class="fa fa-lg fa-fw fa-pen"></i>
                                    </a>
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
                                    <a href="{{ route('role.show', $role) }}"
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
                            <div class="btn-group pull-right me-2">
                                <a href="{{ route('admin.index') }}" class="btn btn-sm btn-secondary" title="Principal">
                                    <i class="zmdi zmdi-menu mr-2"></i><span class="hidden-xs">Principal</span>
                                </a>
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
@stop
