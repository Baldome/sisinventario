@extends('adminlte::page')

@section('title', 'SIS-Inventario | Actualizar activo')

@section('content_header')
    <h1>Actualizar activo</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('asset.update', [$asset]) }}" method="POST" enctype="multipart/form-data">
                        @csrf {{-- Guarda los datos para y genera un token  --}}
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <x-adminlte-input name="code" label="Código" type="number" min=1
                                                label-class="text-primary" value="{{ $asset->code }}" required>
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
                                                label-class="text-primary" value="{{ $asset->name }}" required>
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
                                                required>
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-state text-primary"></i>
                                                    </div>
                                                </x-slot>
                                                <option value="{{ $asset->state }}">{{ $asset->state }}</option>
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
                                                value="{{ $asset->admission_date }}" required>
                                            </x-adminlte-input-date>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <x-adminlte-input type="text" name="model" label="Modelo"
                                                label-class="text-primary" value="{{ $asset->model }}">
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
                                                label-class="text-primary" value="{{ $asset->series }}">
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
                                            <x-adminlte-select name="category_id" label="Seleccione Categoria"
                                                label-class="text-primary" value="{{ $asset->category->id }}" required>
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-map text-primary"></i>
                                                    </div>
                                                </x-slot>
                                                <option value="{{ $asset->category->id }}">{{ $asset->category->name }}
                                                </option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </x-adminlte-select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <x-adminlte-select name="location_id" label="Seleccione Ubicación"
                                                label-class="text-primary" value="{{ $asset->location->name }}" required>
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-google text-primary"></i>
                                                    </div>
                                                </x-slot>
                                                <option value="{{ $asset->location->id }}">{{ $asset->location->name }}
                                                </option>
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
                                                label-class="text-primary">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-lg fa-file-alt text-primary"></i>
                                                    </div>
                                                </x-slot>
                                                {{ $asset->observations }}
                                            </x-adminlte-textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <x-adminlte-textarea name="description" label="Descripción" rows=5
                                                label-class="text-primary">
                                                <x-slot name="prependSlot">
                                                    <div class="input-group-text">
                                                        <i class="fas fa-lg fa-file-alt text-primary"></i>
                                                    </div>
                                                </x-slot>
                                                {{ $asset->description }}
                                            </x-adminlte-textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <x-adminlte-input-file-krajee name="image" label="Imagen"
                                                label-class="text-primary" value="{{ $asset->description }}"
                                                accept="image/*" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <div class="btn-group pull-right me-2">
                                        <button type="submit" class="btn btn-sm btn-primary" title="Actualizar">
                                            <i class="zmdi zmdi-save mr-2"></i><span class="hidden-xs">Actualizar</span>
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
