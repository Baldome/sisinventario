@extends('adminlte::page')

@section('title', 'SIS-Inventario | Actualizar rol')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4>Rol : <span class="text-bold">{{ $role->name }}</span></h4>
        </div>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-border col-md-12">
                <form action="{{ route('role.createPermissionsToRole', $role->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="mb-3" for="name">Permisos Asignados</label>
                                <div class="row">
                                    @foreach ($permissions as $permission)
                                        <div class="col-md-3">
                                            <label for="{{ $permission->name }}">
                                                <input type="checkbox" name="permission[]" value="{{ $permission->name }}"
                                                    id="{{ $permission->name }}"
                                                    {{ in_array($permission->id, $rolePermissions) ? 'checked' : null }}>
                                                {{ $permission->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent">
                        <div class="row mb-3">
                            <div class="col-md-12 mb-2">
                                <div class="btn-group pull-right me-2">
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        <i class="zmdi zmdi-save mr-2"></i><span class="hidden-xs">Asignar</span>
                                    </button>
                                </div>
                                <div class="btn-group pull-right me-2">
                                    <a href="{{ route('role.index') }}" class="btn btn-sm btn-secondary">
                                        <i class="zmdi zmdi-undo mr-2"></i><span class="hidden-xs">Cancelar</span>
                                    </a>
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
    <script></script>
@stop
