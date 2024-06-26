@extends('adminlte::page')

@section('title', 'SIS-Inventario | crear activo')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h4><b>CREAR NUEVO ACTIVO</b></h4>
        </div>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-outline card-primary shadow col-md-12">
                <div class="card-header whit-border">
                    <span class="title text-lg"><b>Ingrese datos del nuevo activo</b></span>
                </div>
                <form action="{{ route('asset.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf {{-- Guarda los datos para y genera un token  --}}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="code">CÓDIGO</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-code"></i></span>
                                            <input name="code" placeholder="Ingrese el código" type="number" min=1
                                                class="form-control" value="{{ old('code') }}" required>
                                        </div>
                                        @error('code')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="name">NOMBRE</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-pencil"></i></span>
                                            <input type="text" name="name" placeholder="Ingrese nombre del activo"
                                                class="form-control" value="{{ old('name') }}" required>
                                        </div>
                                        @error('name')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="state">ESTADO</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text">
                                                <i class="fa-solid fa-ellipsis-vertical ml-1 mr-1"></i>
                                            </span>
                                            <select name="state" class="form-control" required>
                                                <option value="" disabled {{ old('state') ? '' : 'selected' }}>
                                                    Seleccione el estado del activo</option>
                                                <option value="Bueno" {{ old('state') == 'Bueno' ? 'selected' : '' }}>Bueno
                                                </option>
                                                <option value="Regular" {{ old('state') == 'Regular' ? 'selected' : '' }}>
                                                    Regular</option>
                                                <option value="Malo" {{ old('state') == 'Malo' ? 'selected' : '' }}>Malo
                                                </option>
                                                <option value="Inoperativo"
                                                    {{ old('state') == 'Inoperativo' ? 'selected' : '' }}>Inoperativo
                                                </option>
                                                <option value="Obsoleto"
                                                    {{ old('state') == 'Obsoleto' ? 'selected' : '' }}>Obsoleto</option>
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
                                            <input type="date" class="form-control" name="admission_date"
                                                value="{{ old('admission_date') }}" required>
                                        </div>
                                        @error('admission_date')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="category_id">CATEGORÍA</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-tag"></i></span>
                                            <select name="category_id" class="form-control" required>
                                                <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>
                                                    Seleccione la categoria</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('category_id')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="location_id">UBICACIÓN</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-location-dot"></i></span>
                                            <select name="location_id" class="form-control" required>
                                                <option value="" disabled {{ old('location_id') ? '' : 'selected' }}>
                                                    Seleccione la ubicación</option>
                                                @foreach ($locations as $location)
                                                    <option value="{{ $location->id }}"
                                                        {{ old('location_id') == $location->id ? 'selected' : '' }}>
                                                        {{ $location->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('location_id')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="user_id">USUARIO ASIGNADO</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-user"></i></i></span>
                                            <select name="user_id" class="form-control">
                                                <option value="" disabled {{ old('user_id') ? '' : 'selected' }}>
                                                    Seleccione a qué usuario pertenece</option>
                                                <option value="">Sin asignar</option>
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}"
                                                        {{ old('user_id') == $user->id ? 'selected' : '' }}>
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
                                            <input type="text" name="model" placeholder="Ingrese el modelo del activo"
                                                class="form-control" value="{{ old('model') }}">
                                        </div>
                                        @error('model')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="series">SERIE</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-layer-group"></i></span>
                                            <input type="text" name="series"
                                                placeholder="Ingrese la serie del activo" class="form-control"
                                                value="{{ old('series') }}">
                                        </div>
                                        @error('series')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label for="description">DESCRIPCIÓN</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-file-lines"></i></span>
                                            <textarea name="description" rows="3" class="form-control" placeholder="Ingrese descripción">{{ old('description') }}</textarea>
                                        </div>
                                        @error('description')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="observations">OBSERVACIONES</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-file-lines"></i></span>
                                            <textarea name="observations" rows="3" class="form-control" placeholder="Ingrese su observación">{{ old('observations') }}</textarea>
                                        </div>
                                        @error('observations')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="image">IMAGEN</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-image"></i></span>
                                            <input type="file" name="image" class="form-control"
                                                value="{{ old('image') }}" accept="image/*" />
                                        </div>
                                        @error('image')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
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
                                        <i class="fa-solid fa-save mr-2"></i><span class="hidden-xs">Guardar</span>
                                    </button>
                                </div>
                                <div class="btn-group pull-right me-2">
                                    <a href="{{ route('asset.index') }}" class="btn btn-sm btn-secondary"
                                        title="Cancelar">
                                        <i class="fa-solid fa-ban mr-2"></i><span class="hidden-xs">Cancelar</span>
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
