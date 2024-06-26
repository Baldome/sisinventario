@extends('adminlte::page')

@section('title', 'SIS-Inventario | devoluición de herramientas')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4><b>DEVOLVER HERRAMIENTA</b></h4>
        </div>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('loans.update', $loan) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card card-outline shadow col-12 p-4">
                    <div class="card card-outline card-primary shadow">
                        <div class="card-header">
                            <h5><b>Tus préstamos realizados</b></h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-3">
                                    <label for="name">Id</label>
                                    <p>{{ $loan->id }} </p>
                                </div>
                                <div class="form-group col-3">
                                    <label for="name">Nombre</label>
                                    <p>{{ $loan->tool->name }} </p>
                                </div>
                                <div class="form-group col-3">
                                    <label for="name">Código</label>
                                    <p>{{ $loan->tool->code }} </p>
                                </div>
                                <div class="form-group col-3">
                                    <label for="state">Estado</label>
                                    <p>{{ $loan->tool->state }} </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-3">
                                    <label for="admission_date">Fecha de ingreso</label>
                                    <p>{{ $loan->tool->admission_date }} </p>
                                </div>
                                <div class="form-group col-3">
                                    <label for="admission_date">Perteneciente a usuario</label>
                                    <p>{{ $loan->tool->user->name }} </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-outline card-primary shadow">
                        <div class="card-header">
                            <h5><b>Datos de Devolución</b></h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label for="date_time_return">Fecha hora devolución</label>
                                            <div class="input-group form-group">
                                                <span class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
                                                <input name="date_time_return" type="datetime-local" class="form-control"
                                                    required>
                                            </div>
                                            @error('date_time_return')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-sm-8">
                                            <label for="date_time_return">Observación</label>
                                            <div class="form-group input-group">
                                                <span class="input-group-text"><i class="fa-solid fa-file-lines"></i></span>
                                                <textarea name="observations" rows=2 class="form-control" placeholder="Ingrese su observación">{{ $loan->observations }}</textarea>
                                            </div>
                                            @error('observations')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-transparent">
                            <div class="col-md-12 mb-3">
                                <div class="btn-group pull-right me-2">
                                    <button type="submit" class="btn btn-sm btn-primary" title="Guardar">
                                        <i class="fa-solid fa-save mr-2"></i><span class="hidden-xs">Devolver
                                            préstamo</span>
                                    </button>
                                </div>
                                <div class="btn-group pull-right me-2">
                                    <a href="{{ route('loans.return') }}" class="btn btn-sm btn-secondary"
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
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script></script>
@stop
