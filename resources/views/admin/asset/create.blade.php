@extends('adminlte::page')

@section('title', 'SIS-Inventario | Crear activo')

@section('content_header')
    <h1>Nuevo activo</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('asset.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf {{-- Guarda los datos para y genera un token  --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <x-adminlte-input name="code" label="Código"
                                                placeholder="Ingrese el código..." type="number" min=1
                                                label-class="text-primary" value="{{ old('code') }}" required>
                                                <x-slot name="appendSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-hashtag text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <x-adminlte-input type="text" name="name" label="Nombre"
                                                placeholder="Ingrese nombre del activo..." label-class="text-primary"
                                                value="{{ old('name') }}" required>
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="zmdi zmdi-pin-user text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <x-adminlte-select name="state" label="Estado" label-class="text-primary"
                                                value="{{ old('state') }}" required>
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-state text-primary"></i>
                                                    </div>
                                                </x-slot>
                                                <option value="Bueno">Bueno</option>
                                                <option value="Regular">Regular</option>
                                                <option value="Malo">Malo</option>
                                                <option value="Inoperativo">Inoperativo</option>
                                                <option value="Obsoleto">Obsoleto</option>
                                            </x-adminlte-select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <x-adminlte-input-date type="date" name="admission_date"
                                                label="Fecha de ingreso" label-class="text-primary"
                                                value="{{ old('admission_date') }}"
                                                placeholder="Ingrese la fecha de ingreso..." required>
                                            </x-adminlte-input-date>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <x-adminlte-input type="text" name="model" label="Modelo"
                                                placeholder="Ingrese el modelo del activo..." label-class="text-primary"
                                                value="{{ old('model') }}">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="zmdi zmdi-card text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <x-adminlte-input type="text" name="series" label="Serie"
                                                placeholder="Ingrese la serie del activo..." label-class="text-primary"
                                                value="{{ old('series') }}">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="zmdi zmdi-map text-primary"></i>
                                                    </div>
                                                </x-slot>
                                            </x-adminlte-input>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <x-adminlte-select name="category_id" label="Seleccione Categoria" label-class="text-primary"
                                                value="{{ old('category') }}" required>
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-map text-primary"></i>
                                                    </div>
                                                </x-slot>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </x-adminlte-select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <x-adminlte-select name="location_id" label="Seleccione Ubicación" label-class="text-primary"
                                                value="{{ old('location') }}" required>
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-google text-primary"></i>
                                                    </div>
                                                </x-slot>
                                                @foreach ($locations as $location)
                                                    <option value="{{ $location->id }}">{{ $location->name }}</option>
                                                @endforeach
                                            </x-adminlte-select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <x-adminlte-textarea name="observations" label="Observaciones" rows=5
                                                label-class="text-primary" placeholder="Ingrese su observación...">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-lg fa-file-alt text-primary"></i>
                                                    </div>
                                                </x-slot>
                                                {{ old('observations') }}
                                            </x-adminlte-textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <x-adminlte-textarea name="description" label="Descripción" rows=5
                                                label-class="text-primary" placeholder="Ingrese descripción...">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-lg fa-file-alt text-primary"></i>
                                                    </div>
                                                </x-slot>
                                                {{ old('description') }}
                                            </x-adminlte-textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <x-adminlte-input-file-krajee name="image" label="Imagen"
                                                label-class="text-primary" value="{{ old('image') }}" accept="image/*"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <div class="btn-group pull-right me-2">
                                        <button type="submit" class="btn btn-sm btn-primary" title="Guardar">
                                            <i class="zmdi zmdi-save mr-2"></i><span class="hidden-xs">Guardar</span>
                                        </button>
                                    </div>
                                    <div class="btn-group pull-right me-2">
                                        <a href="{{ route('asset.index', []) }}" class="btn btn-sm btn-secondary"
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
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script></script>
@stop
