@extends('adminlte::page')

@section('title', 'SIS-Inventario | Asignar Activo')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4><b>ASIGNACIÓN DE ACTIVO</b></h4>
        </div>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('asset.assignAssetToUser', $asset->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h5>Asignar activo: <b>{{ $asset->name }}</b></h5>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <label for="name">Nombre</label>
                                        <p>{{ $asset->name }}</p>
                                    </div>
                                    <div class="col-4">
                                        <label for="code">Código</label>
                                        <p>{{ $asset->code }}</p>
                                    </div>
                                    <div class="col-4">
                                        <label for="state">Estado</label>
                                        <p>{{ $asset->state }}</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <label for="admission_date">Fecha de ingreso</label>
                                        <p>{{ $asset->admission_date }}</p>
                                    </div>
                                    <div class="col-4">
                                        <label for="model">Modelo</label>
                                        <p>{{ $asset->model }}</p>
                                    </div>
                                    <div class="col-4">
                                        <label for="series">Serie</label>
                                        <p>{{ $asset->series }}</p>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-4">
                                        <label for="category">Categoría</label>
                                        <p>{{ $asset->category->name }}</p>
                                    </div>
                                    <div class="col-4">
                                        <label for="location">Ubicación</label>
                                        <p>{{ $asset->location->name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-4">
                            <div class="card-header">
                                <h5><b>Asignar al Usuario</b></h5>
                            </div>
                            <div class="card-body">
                                <div class="col-sm-6">
                                    <label for="user">Seleccione un usuario</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                        <select name="user_id" class="form-control" id="user" required>
                                            <option value="" disabled selected>Seleccione un usuario para asignar
                                            </option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}"
                                                    {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                                    {{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('user_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="btn-group pull-right me-2">
                            <button type="submit" class="btn btn-sm btn-primary me-2">
                                <i class="fa-solid fa-save mr-2"></i><span>Asignar activo</span>
                            </button>
                            <a href="{{ route('asset.index') }}" class="btn btn-sm btn-secondary">
                                <i class="fa-solid fa-ban mr-2"></i><span>Cancelar</span>
                            </a>
                        </div>
                    </div>
                </div>
            </form>
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
