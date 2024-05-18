@extends('adminlte::page')

@section('title', 'SIS-Inventario | crear activo')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1>Asignar activo</h1>
        </div>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form action="{{ route('asset.assignAssetToUser') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card col-12">
                    <div class="card-header">
                        <h5>Asignar activo: <span>{{ $unassignedAssets->name }}</span></h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="asset">Seleccione activo</label>
                                <select name="asset_id" class="form-control" id="asset" required>
                                    <option>Seleccione un activo</option>
                                    @if (old('asset_id'))
                                        <option value="{{ old('asset_id') }}">{{ old('asset_id') }}</option>
                                    @endif
                                    @foreach ($unassignedAssets as $asset)
                                        <option value="{{ $asset->id }}">{{ $asset->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-4">
                                <label for="name">Nombre</label>
                                <input type="text" class="form-control" value="" readonly>
                            </div>
                            <div class="form-group col-4">
                                <label for="name">Código</label>
                                <span class="input-group-text"><i class="fa-solid fa-hashtag"></i></span>
                                <input type="text" class="form-control" value="" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="state">Estado</label>
                                <input name="state" class="form-control" value="" readonly>
                            </div>
                            <div class="form-group col-4">
                                <label for="admission_date">Fecha de ingreso</label>
                                <input type="text" class="form-control" value="" readonly>
                            </div>
                            <div class="form-group col-4">
                                <label for="model">Modelo</label>
                                <input type="text" class="form-control" value="" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="state">Serie</label>
                                <input name="state" class="form-control" value="" readonly>
                            </div>
                            <div class="form-group col-4">
                                <label for="admission_date">Categoria</label>
                                <input type="text" class="form-control" value="" readonly>
                            </div>
                            <div class="form-group col-4">
                                <label for="model">ubicación</label>
                                <input type="text" class="form-control" value="" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card col-12">
                    <div class="card-header">
                        <h5>Datos de usuario</h5>
                    </div>
                    <div class="card body">
                        <div class="form-group col-4">
                            <label for="user">Seleccione usuario</label>
                            <select name="user_id" class="form-control" id="user" required>
                                <option>Seleccione un usuario</option>
                                @if (old('user_id'))
                                    <option value="{{ old('user_id') }}">{{ old('user_id') }}</option>
                                @endif
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="btn-group pull-right me-2">
                        <button type="submit" class="btn btn-sm btn-primary" title="Guardar">
                            <i class="zmdi zmdi-save mr-2"></i><span class="hidden-xs">Asignar
                                activo</span>
                        </button>
                    </div>
                    <div class="btn-group pull-right me-2">
                        <a href="{{ route('asset.index') }}" class="btn btn-sm btn-secondary" title="Cancelar">
                            <i class="zmdi zmdi-undo mr-2"></i><span class="hidden-xs">Cancelar</span>
                        </a>
                    </div>
                </div>
            </form>
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
