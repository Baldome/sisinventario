@extends('adminlte::page')

@section('title', 'SIS-Inventario | Editar activo')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4><b>EDITAR ACTIVO</b></h4>
        </div>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-border col-md-12">
                <div class="card-header whit-border">
                    <span class="title text-lg">Actualizar datos del activo: <b>{{ $asset->name }}</b></span>
                    <div class="card-tools">
                        {{-- @can('listar activos') --}}
                        <div class="btn-group pull-right me-2">
                            <a href="{{ route('asset.index') }}" class="btn btn-sm btn-secondary">
                                <i class="fa-solid fa-list mr-2"></i><span class="hidden-xs">Listar activos</span>
                            </a>
                        </div>
                        {{-- @endcan --}}
                    </div>
                </div>
                <form action="{{ route('asset.update', $asset) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="code">CÓDIGO</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-code"></i></span>
                                            <input name="code" type="number" min=1 class="form-control"
                                                value="{{ $asset->code }}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="name">NOMBRE</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-pencil"></i></span>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $asset->name }}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="state">ESTADO</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i
                                                    class="fa-solid fa-ellipsis-vertical ml-1 mr-1"></i></span>
                                            <select name="state" class="form-control" required>
                                                <option value="Bueno" {{ $asset->state === 'Bueno' ? 'selected' : '' }}>
                                                    Bueno</option>
                                                <option value="Regular" {{ $asset->state === 'Regular' ? 'selected' : '' }}>
                                                    Regular</option>
                                                <option value="Malo" {{ $asset->state === 'Malo' ? 'selected' : '' }}>Malo
                                                </option>
                                                <option value="Inoperativo"
                                                    {{ $asset->state === 'Inoperativo' ? 'selected' : '' }}>Inoperativo
                                                </option>
                                                <option value="Obsoleto"
                                                    {{ $asset->state === 'Obsoleto' ? 'selected' : '' }}>Obsoleto</option>
                                            </select>
                                        </div>
                                        @error('state')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="admission_date">FECHA INGRESO</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                            <input type="date" name="admission_date" class="form-control"
                                                value="{{ $asset->admission_date }}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="category_id">CATEGORÍA</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-tag"></i></span>
                                            <select name="category_id" class="form-control" required>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $category->id === $asset->category_id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="location_id">UBICACIÓN</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-location-dot"></i></span>
                                            <select name="location_id" class="form-control" required>
                                                @foreach ($locations as $location)
                                                    <option value="{{ $location->id }}"
                                                        {{ $location->id === $asset->location_id ? 'selected' : '' }}>
                                                        {{ $location->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="user_id">ASIGNAR USUARIO</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-user"></i></i></span>
                                            <select name="user_id" class="form-control">
                                                @if (old('user_id'))
                                                    <option value="{{ old('user_id') }}">{{ old('user_id') }}
                                                    </option>
                                                @endif
                                                <option value="">Quitar asignación</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}"
                                                        {{ $user->id === $asset->user_id ? 'selected' : '' }}>
                                                        {{ $user->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('user_id')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="model">MODELO</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-cube"></i></span>
                                            <input type="text" name="model" class="form-control"
                                                value="{{ $asset->model }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="series">SERIE</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-layer-group"></i></span>
                                            <input type="text" name="series" class="form-control"
                                                value="{{ $asset->series }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="description">DESCRIPCIÓN</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-file-lines"></i></span>
                                            <textarea name="description" rows=3 class="form-control" placeholder="Ingrese descripción">{{ $asset->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="observations">OBSERVACIONES</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-file-lines"></i></span>
                                            <textarea name="observations"rows=3 class="form-control" placeholder="Ingrese su observación">{{ $asset->observations }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="image">IMAGEN</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-image"></i></span>
                                            <input type="hidden" name="old_image" value="{{ $asset->image }}">
                                            <input type="file" name="image" class="form-control"
                                                accept="image/*" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="image">IMAGEN ACTUAL</label>
                                        <div class="form-group input-group">
                                            <img src="{{ $asset->image }}" alt="Imgagen del activo" width="100px">
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
                                        <i class="fa-solid fa-save mr-2"></i><span class="hidden-xs">Actualizar</span>
                                    </button>
                                </div>
                                {{-- @can('listar activos') --}}
                                <div class="btn-group pull-right me-2">
                                    <a href="{{ route('asset.index') }}" class="btn btn-sm btn-secondary"
                                        title="Cancelar">
                                        <i class="fa-solid fa-ban mr-2"></i><span class="hidden-xs">Cancelar</span>
                                    </a>
                                </div>
                                {{-- @endcan --}}
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
    <style>
        input:invalid {
            border-color: red;
        }

        select:invalid {
            border-color: red;
        }
    </style>
@stop

@section('js')
@stop
