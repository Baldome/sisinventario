@extends('adminlte::page')

@section('title', 'SIS-Inventario | Editar herramienta')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h1><b>ACTUALIZAR HERRAMIENTA</b></h1>
        </div>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-outline card-primary shadow col-md-12">
                <div class="card-header whit-border">
                    <span class="title text-lg">Actualizar datos de la herramienta: <b>{{ $tool->name }}</b></span>
                </div>
                <form action="{{ route('tools.update', $tool) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <label for="code">CÓDIGO</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-hashtag"></i></span>
                                            <input name="code" type="number" min=1 class="form-control"
                                                value="{{ $tool->code }}" required>
                                        </div>
                                        @error('code')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="name">NOMBRE</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-pencil"></i></span>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ $tool->name }}" required>
                                        </div>
                                        @error('name')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="state_id">ESTADO</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i
                                                    class="fa-solid fa-ellipsis-vertical ml-1 mr-1"></i></span>
                                            <select name="state_id" class="form-control" required>
                                                @foreach ($states as $state)
                                                    <option value="{{ $state->id }}"
                                                        {{ $state->id === $tool->state_id ? 'selected' : '' }}>
                                                        {{ $state->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('state_id')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <label for="user_id">ASIGNAR USUARIO</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                                            <select name="user_id" class="form-control" required>
                                                @if (old('user_id'))
                                                    <option value="{{ old('user_id') }}">{{ old('user_id') }}
                                                    </option>
                                                @endif
                                                @foreach ($users as $user)
                                                    <option value="{{ $user->id }}"
                                                        {{ $user->id === $tool->user_id ? 'selected' : '' }}>
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
                                        <label for="admission_date">FECHA INGRESO</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                                            <input type="date" name="admission_date" class="form-control"
                                                value="{{ $tool->admission_date }}">
                                        </div>
                                        @error('admission_date')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="unit_id">UNIDAD</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-brands fa-unity"></i></span>
                                            <select name="unit_id" class="form-control" required>
                                                @foreach ($units as $unit)
                                                    <option value="{{ $unit->id }}"
                                                        {{ $unit->id === $tool->unit_id ? 'selected' : '' }}>
                                                        {{ $unit->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('unit_id')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <label for="category_id">CATEGORÍA</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-tag"></i></span>
                                            <select name="category_id" class="form-control" required>
                                                </option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $category->id === $tool->category_id ? 'selected' : '' }}>
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
                                                </option>
                                                @foreach ($locations as $location)
                                                    <option value="{{ $location->id }}"
                                                        {{ $location->id === $tool->location_id ? 'selected' : '' }}>
                                                        {{ $location->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('location_id')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="amount">CANTIDAD</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-cube"></i></span>
                                            <input name="amount" type="number" min=1 class="form-control"
                                                value="{{ $tool->amount }}" required>
                                        </div>
                                        @error('amount')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-4">
                                        <label for="description">DESCRIPCIÓN</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-file-lines"></i></span>
                                            <textarea name="description" rows=3 class="form-control">{{ $tool->description }}</textarea>
                                        </div>
                                        @error('description')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="observations">OBSERVACIONES</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-file-lines"></i></span>
                                            <textarea name="observations" rows=3 class="form-control">{{ $tool->observations }}</textarea>
                                        </div>
                                        @error('observations')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="image">IMAGEN</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-image"></i></span>
                                            <input type="hidden" name="old_image" value="{{ $tool->image }}">
                                            <input type="file" name="image" class="form-control"
                                                accept="image/*" />
                                        </div>
                                        @error('image')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                        <div class="form-group text-center mt-3">
                                            <label for="image_old">IMAGEN ACTUAL</label>
                                            <img src="{{ $tool->image }}" alt="Imagen de la herramienta"
                                                width="100px">
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
                                        <i class="fa-solid fa-pen-to-square mr-2"></i><span
                                            class="hidden-xs">Actualizar</span>
                                    </button>
                                </div>
                                {{-- @can('listar herramientas') --}}
                                <div class="btn-group pull-right me-2">
                                    <a href="{{ route('tools.index') }}" class="btn btn-sm btn-secondary"
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
