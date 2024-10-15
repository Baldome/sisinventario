@extends('adminlte::page')

@section('title', 'SIS-Inventario | asignar herramienta')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h4><b>ASIGNACIÓN DE HERRAMIENTAS</b></h4>
        </div>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('tools.assignToolToUser', $tool->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card shadow p-4">
                    <div class="card card-outline card-primary shadow col-md-12">
                        <div class="card-header">
                            <h5>Asignar la herramienta: <span>{{ $tool->name }}</span></h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-3">
                                    <label for="name">Id</label>
                                    <p>{{ $tool->id }}</p>
                                </div>
                                <div class="form-group col-3">
                                    <label for="name">Nombre</label>
                                    <p>{{ $tool->name }}</p>
                                </div>
                                <div class="form-group col-3">
                                    <label for="name">Código</label>
                                    <p>{{ $tool->code }}</p>
                                </div>
                                <div class="form-group col-3">
                                    <label for="state">Estado</label>
                                    <p>{{ $tool->state->name }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-3">
                                    <label for="admission_date">Fecha de ingreso</label>
                                    <p>{{ $tool->admission_date }}</p>
                                </div>
                                <div class="form-group col-3">
                                    <label for="admission_date">Categoria</label>
                                    <p>{{ $tool->category->name }}</p>
                                </div>
                                <div class="form-group col-3">
                                    <label for="model">ubicación</label>
                                    <p>{{ $tool->location->name }}</p>
                                </div>
                                <div class="form-group col-3">
                                    <label for="unit">Unidad</label>
                                    <p>{{ $tool->unit->name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-outline card-primary shadow col-md-12">
                        <div class="card-header">
                            <h5>Datos de usuario</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="user">Seleccione usuario</label>
                                            <div class="input-group form-group">
                                                <span class="input-group-text"><i class="fa-solid fa-user-check"></i></span>
                                                <select name="user_id" class="form-control" id="user" required>
                                                    <option disabled selected>Seleccione al que desee asignar</option>
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent">
                        <div class="col-md-12">
                            <div class="btn-group pull-right me-2">
                                <button type="submit" class="btn btn-sm btn-primary" title="Guardar">
                                    <i class="fa-solid fa-check mr-2"></i><span class="hidden-xs">Asignar
                                        herramienta</span>
                                </button>
                            </div>
                            <div class="btn-group pull-right me-2">
                                <a href="{{ route('tools.index') }}" class="btn btn-sm btn-secondary" title="Cancelar">
                                    <i class="fa-solid fa-ban mr-2"></i><span class="hidden-xs">Cancelar</span>
                                </a>
                            </div>
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
@stop

@section('js')
    <script></script>
@stop
