@extends('adminlte::page')

@section('title', 'SIS-Inventario | crear activo')

@section('content_header')
    {{-- <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Nuevo activo</h1>
        </div>
    </div> --}}
@stop

@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-md-12">
            <div class="card card-border col-md-12">
                <div class="card-header whit-border">
                    <span class="title text-bold text-lg">Crear un nuevo activo</span>
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
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-hashtag"></i></span>
                                            <input name="code" placeholder="Ingrese el código" type="number" min=1
                                                class="form-control" value="{{ old('code') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-pencil"></i></span>
                                            <input type="text" name="name" placeholder="Ingrese nombre del activo"
                                                class="form-control" value="{{ old('name') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i
                                                    class="fa-solid fa-ellipsis-vertical ml-1 mr-1"></i></span>
                                            <select name="state" class="form-control" required>
                                                @if (old('state'))
                                                    <option value="{{ old('state') }}">{{ old('state') }}</option>
                                                @endif
                                                <option>Seleccione es estado del activo</option>
                                                <option value="Bueno">Bueno</option>
                                                <option value="Regular">Regular</option>
                                                <option value="Malo">Malo</option>
                                                <option value="Inoperativo">Inoperativo</option>
                                                <option value="Obsoleto">Obsoleto</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                            <input type="date" name="admission_date" class="form-control"
                                                placeholder="Ingrese la fecha del ingreso del activo"
                                                value="{{ old('admission_date') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-cube"></i></span>
                                            <input type="text" name="model" placeholder="Ingrese el modelo del activo"
                                                class="form-control" value="{{ old('model') }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-layer-group"></i></span>
                                            <input type="text" name="series" placeholder="Ingrese la serie del activo"
                                                class="form-control" value="{{ old('series') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-tag"></i></span>
                                            <select name="category_id" class="form-control" required>
                                                @if (old('category_id'))
                                                    <option value="{{ old('category_id') }}">{{ old('category_id') }}
                                                    </option>
                                                @endif
                                                <option>Seleccione la categoria</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-location-dot"></i></span>
                                            <select name="location_id" class="form-control" required>
                                                @if (old('location_id'))
                                                    <option value="{{ old('location_id') }}">{{ old('location_id') }}
                                                    </option>
                                                @endif
                                                <option>Seleccione la ubicación</option>
                                                @foreach ($locations as $location)
                                                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-file-lines"></i></span>
                                            <textarea name="description" rows=3 class="form-control" placeholder="Ingrese descripción">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-file-lines"></i></span>
                                            <textarea name="observations"rows=3 class="form-control" placeholder="Ingrese su observación">{{ old('observations') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-image"></i></span>
                                            <input type="file" name="image" class="form-control"
                                                value="{{ old('image') }}" accept="image/*" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-user"></i></i></span>
                                            <select name="user_id" class="form-control" required>
                                                @if (old('user_id'))
                                                    <option value="{{ old('user_id') }}">{{ old('user_id') }}
                                                    </option>
                                                @endif
                                                <option>Seleccione a que usuario pertenece</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
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
