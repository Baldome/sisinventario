@extends('adminlte::page')

@section('title', 'SIS-Inventario | Usuarios')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4>Administración de Usuarios</h4>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-tools">
                <div class="btn-group pull-right me-2">
                    {{-- @can('crear usuario') --}}
                    <a href="{{ route('user.create', []) }}" class="btn btn-sm btn-primary" title="Crear">
                        <i class="zmdi zmdi-plus mr-2"></i><span class="hidden-xs">Crear</span>
                    </a>
                    {{-- @endcan --}}
                </div>
            </div>
        </div>
        <div class="card-body">
            @php
                $heads = [
                    'Nro',
                    'Imagen',
                    'Código',
                    'Nombres',
                    'Apellidos',
                    'Email',
                    'Rol',
                    'Estado',
                    'Celular',
                    ['label' => 'Acciones', 'no-export' => true, 'width' => 12],
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
                        <td>{{ $user->code }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if (!empty($user->getRoleNames()))
                                @foreach ($user->getRoleNames() as $role_name)
                                    <label class="badge bg-primary mx-1">{{ $role_name }}</label>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            @if ($user->state === 'Activo')
                                <span class="badge bg-success mx-1">Activo</span>
                            @else
                                <span class="badge bg-danger mx-1">Inactivo</span>
                            @endif
                        </td>
                        <td>{{ $user->phone }}</td>
                        <td>
                            {{-- @can('editar usuario') --}}
                            <a href="{{ route('user.edit', [$user]) }}"
                                class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </a>
                            {{-- @endcan --}}
                            {{-- @can('eliminar usuario') --}}
                            <form style="display: inline" action="{{ route('user.destroy', [$user]) }}" method="post"
                                onclick="ask{{ $user->id }}(event)" id="myform{{ $user->id }}">
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
                            {{-- @endcan --}}
                            <a href="{{ route('user.show', [$user]) }}"
                                class="btn btn-xs btn-default text-teal mx-1 shadow" title="Detalles">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-md-12">
                    <div class="btn-group pull-right me-2">
                        <a href="{{ route('dashboard', []) }}" class="btn btn-sm btn-secondary" title="Principal">
                            <i class="zmdi zmdi-menu mr-2"></i><span class="hidden-xs">Principal</span>
                        </a>
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
