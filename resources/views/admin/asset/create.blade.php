@extends('adminlte::page')

@section('title', 'SIS-Inventario | crear activo')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Nuevo activo</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-border col-md-12">
                <div class="card-header whit-border">
                    <div class="card-tools">
                        {{-- @can('listar activos') --}}
                            <div class="btn-group pull-right me-2">
                                <a href="{{ route('asset.index') }}" class="btn btn-sm btn-secondary">
                                    <i class="zmdi zmdi-format-list-bulleted mr-2"></i><span class="hidden-xs">Listar</span>
                                </a>
                            </div>
                        {{-- @endcan --}}
                    </div>
                </div>
                <form action="{{ route('asset.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf {{-- Guarda los datos para y genera un token  --}}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="code">Código</label>
                                            <input name="code" placeholder="Ingrese el código" type="number" min=1
                                                class="form-control" value="{{ old('code') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Nombre activo</label>
                                            <input type="text" name="name" placeholder="Ingrese nombre del activo"
                                                class="form-control" value="{{ old('name') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="state">Seleccione etado del activo</label>
                                            <select name="state" class="form-control" required>
                                                <option value="{{ old('state') }}">{{ old('state') }}</option>
                                                <option value="Bueno">Bueno</option>
                                                <option value="Regular">Regular</option>
                                                <option value="Malo">Malo</option>
                                                <option value="Inoperativo">Inoperativo</option>
                                                <option value="Obsoleto">Obsoleto</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="admission_date">Fecha de ingreso</label>
                                            <input type="date" name="admission_date" class="form-control"
                                                value="{{ old('admission_date') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="model">Modelo</label>
                                            <input type="text" name="model" placeholder="Ingrese el modelo del activo"
                                                class="form-control" value="{{ old('model') }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="series">Serie</label>
                                            <input type="text" name="series" placeholder="Ingrese la serie del activo"
                                                class="form-control" value="{{ old('series') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="category_id">Seleccione categoría</label>
                                            <select name="category_id" class="form-control" required>
                                                <option value="{{ old('category_id') }}">{{ old('category_id') }}</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="location_id">Seleccione ubicación</label>
                                            <select name="location_id" class="form-control" required>
                                                <option value="{{ old('location_id') }}">{{ old('location_id') }}</option>
                                                @foreach ($locations as $location)
                                                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="description">Descripción</label>
                                            <textarea name="description" rows=3 class="form-control" placeholder="Ingrese descripción">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="observations">Observaciones</label>
                                            <textarea name="observations"rows=3 class="form-control" placeholder="Ingrese su observación">{{ old('observations') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="image">Ingrese una imagen</label>
                                            <input type="file" name="image" class="form-control"
                                                value="{{ old('image') }}" accept="image/*" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent">
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="btn-group pull-right me-2">
                                    <button type="submit" class="btn btn-sm btn-primary" title="Guardar">
                                        <i class="zmdi zmdi-save mr-2"></i><span class="hidden-xs">Guardar</span>
                                    </button>
                                </div>
                                <div class="btn-group pull-right me-2">
                                    <a href="{{ route('asset.index') }}" class="btn btn-sm btn-secondary"
                                        title="Cancelar">
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
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script></script>
@stop
