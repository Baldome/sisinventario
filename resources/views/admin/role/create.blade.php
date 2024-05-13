@extends('adminlte::page')

@section('title', 'SIS-Inventario | crear rol')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4>Nuevo rol</h4>
        </div>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-border col-md-12">
                <div class="card-header with-border">
                    <div class="card-tools">
                        <div class="btn-group pull-right me-2">
                            <a href="{{ route('role.index') }}" class="btn btn-sm btn-secondary">
                                <i class="zmdi zmdi-format-list-bulleted mr-2"></i><span class="hidden-xs">Listar</span>
                            </a>
                        </div>
                    </div>
                </div>
                <form action="{{ route('role.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label for="name">Nombre rol</label>
                                <input type="text" name="name" class="form-control"
                                    placeholder="Ingrese nombre del rol" value="{{ old('name') }}" required>
                                @error('name')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent">
                        <div class="row mb-3">
                            <div class="col-md-12 mb-2">
                                <div class="btn-group pull-right me-2">
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        <i class="zmdi zmdi-save mr-2"></i><span class="hidden-xs">Guardar</span>
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
@stop
