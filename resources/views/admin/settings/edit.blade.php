@extends('adminlte::page')

@section('title', 'SIS-Inventario | Editar datos de la institución')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1><b>ACTUALIZAR DATOS DE LA INSTITUCIÓN</b></h1>
        </div>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-border col-md-12">
                <div class="card-header whit-border">
                    <span class="title text-lg">Datos registrados de la institución</span>
                    <div class="card-tools">
                        {{-- @can('listar configuraciones') --}}
                        <div class="btn-group pull-right me-2">
                            <a href="{{ route('settings.index') }}" class="btn btn-sm btn-primary">
                                <i class="fa-solid fa-list mr-2"></i><span class="hidden-xs">Visualizar datos de la
                                    institción</span>
                            </a>
                        </div>
                        {{-- @endcan --}}
                    </div>
                </div>
                <form action="{{ route('settings.update', $setting) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <label for="name">NOMBRE INSTITUCIÓN</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-pencil"></i></span>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $setting->name }}" required>
                                        </div>
                                        @error('name')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="founding_date">FECHA DE FUNDACIÓN</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                            <input type="date" name="founding_date" class="form-control"
                                                value="{{ $setting->founding_date }}">
                                        </div>
                                        @error('founding_date')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="phone_number">NÚMERO TELEFÓNICO</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i
                                                    class="fa-solid fa-ellipsis-vertical ml-1 mr-1"></i></span>
                                            <input name="phone_number" type="text" min=1 class="form-control"
                                                value="{{ $setting->phone_number }}" required>
                                        </div>
                                        @error('phone_number')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <label for="cell_phone">CELULAR</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-call"></i></span>
                                            <input type="text" name="cell_phone" class="form-control"
                                                value="{{ $setting->cell_phone }}">
                                        </div>
                                        @error('cell_phone')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="email">CORREO ELECTRÓNICO</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-email"></i></span>
                                            <input type="email" name="email" class="form-control"
                                                value="{{ $setting->email }}">
                                        </div>
                                        @error('email')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="website">SITIO WEB</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-tag"></i></span>
                                            <input type="text" name="website" class="form-control"
                                                value="{{ $setting->website }}">
                                        </div>
                                        @error('website')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <label for="address">DIRECCIÓN</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-file-lines"></i></span>
                                            <textarea name="address" rows=3 class="form-control">{{ $setting->address }}</textarea>
                                        </div>
                                        @error('address')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="state">ESTADO</label>
                                        <div class="form-group input-group">
                                            <select name="state" class="form-control" required>
                                                <option value="{{ true }}"
                                                    {{ $setting->state === 'Activo' ? 'selected' : '' }}>Activo</option>
                                                <option
                                                    value="{{ false }}"{{ $setting->state === 'Inactivo' ? 'selected' : '' }}>
                                                    Inactivo</option>
                                            </select>
                                        </div>
                                        @error('state')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="logo">IMAGEN</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-image"></i></span>
                                            <input type="hidden" name="old_logo" value="{{ $setting->logo }}">
                                            <input type="file" name="logo" class="form-control"
                                                accept="image/*" />
                                        </div>
                                        @error('logo')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                        <div class="form-group text-center mt-3">
                                            <label for="old_logo">LOGO ACTUAL</label>
                                            <img src="{{ $setting->logo }}" alt="Logo de la institución" width="100px">
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
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        <i class="fa-solid fa-pen-to-square mr-2"></i><span
                                            class="hidden-xs">Actualizar</span>
                                    </button>
                                </div>
                                {{-- @can('listar configuraciones') --}}
                                <div class="btn-group pull-right me-2">
                                    <a href="{{ route('settings.index') }}" class="btn btn-sm btn-secondary"
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
    {{-- Add here extra scripts --}}
@stop
