@extends('adminlte::page')

@section('title', 'SIS-Inventario | Usuarios')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h4><b>ADMINISTRACIÓN DE USUARIOS</b></h4>
        </div>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-outline card-primary col-md-12 shadow">
                <div class="card-header with-border">
                    <b>Listado de todos los usuarios</b>
                    <div class="card-tools">
                        <div class="btn-group pull-right me-2">
                            @can('crear usuario')
                            <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary" title="Crear">
                                <i class="fa-solid fa-plus mr-2"></i><span class="hidden-xs">Crear nuevo usuario</span>
                            </a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @php
                        $heads = [
                            '#',
                            'Imagen',
                            'Nombres',
                            'Apellidos',
                            'Email',
                            'Rol',
                            'Dirección',
                            'Estado',
                            'Celular',
                            ['label' => 'Acciones', 'no-export' => true, 'width' => 10],
                        ];
                        $btnEdit = '';
                        $btnDelete = '<button class="btn btn-sm shadow btn-default text-danger mx-1" title="Eliminar">
                                      <i class="fa-solid fa-trash"></i>
                                      </button>';
                        $btnDetails = '';
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
                        @foreach ($users as $user)
                            @php
                                $counter++;
                            @endphp
                            <tr>
                                <td>{{ $counter }}</td>
                                <td><span class="bg-light inline rounded-circle user-image">
                                        <img src="{{ $user->profile_photo_path }}" alt="Foto de perfil" width="50px">
                                    </span>
                                </td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if (!empty($user->getRoleNames()))
                                        @foreach ($user->getRoleNames() as $role_name)
                                            <label class="badge bg-primary">{{ $role_name }}</label>
                                        @endforeach
                                    @endif
                                </td>
                                <td>{{ $user->address }}</td>
                                <td>
                                    @if ($user->is_active)
                                        <span class="badge bg-success">Activo</span>
                                    @else
                                        <span class="badge bg-danger">Inactivo</span>
                                    @endif
                                </td>
                                <td>{{ $user->phone }}</td>
                                <td style="text-align: center; align-content: center">
                                    @can('editar usuario')
                                    <a href="{{ route('user.edit', [$user]) }}" class="btn btn-sm shadow btn-default text-primary"
                                        title="Editar">
                                        <i class="fa-solid fa-edit"></i>
                                    </a>
                                    @endcan
                                    @can('eliminar usuario')
                                    <form style="display: inline" action="{{ route('user.destroy', [$user]) }}"
                                        method="post" onclick="ask{{ $user->id }}(event)"
                                        id="myform{{ $user->id }}">
                                        @csrf
                                        @method('DELETE')
                                        {!! $btnDelete !!}
                                    </form>
                                    <script>
                                        function ask{{ $user->id }}(event) {
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
                                                    var form = $('#myform{{ $user->id }}');
                                                    form.submit();
                                                }
                                            });
                                        }
                                    </script>
                                    @endcan
                                    @can('visualizar usuario')
                                    <a href="{{ route('user.show', [$user]) }}" class="btn btn-sm shadow btn-default text-teal"
                                        title="Detalles">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </x-adminlte-datatable>
                </div>
                <div class="card-footer bg-transparent mb-3">
                    <div class="row">
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
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
