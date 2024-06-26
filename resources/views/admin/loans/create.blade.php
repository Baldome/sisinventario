@extends('adminlte::page')

@section('title', 'SIS-Inventario | prestar herramienta')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h4><b>CREAR UN NUEVO PRESTAMO DE HERRAMIENTA</b></h4>
        </div>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('loans.store') }}" method="POST" enctype="multipart/form-data">
                <div class="card shadow justify-content-center align-items-center p-4">
                    @csrf
                    <div class="card card-outline card-primary shadow col-11">
                        <div class="card-header">
                            <h5>Prestar la herramienta: <b>{{ $tool->name }}</b></h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-3">
                                    <label for="name">ID</label>
                                    <p>{{ $tool->id }} </p>
                                </div>
                                <div class="form-group col-3">
                                    <label for="name">NOMBRE</label>
                                    <p>{{ $tool->name }} </p>
                                </div>
                                <div class="form-group col-3">
                                    <label for="name">CÓDIGO</label>
                                    <p>{{ $tool->code }} </p>
                                </div>
                                <div class="form-group col-3">
                                    <label for="state">ESTADO</label>
                                    <p>{{ $tool->state }} </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-3">
                                    <label for="admission_date">FECHA INGRESO</label>
                                    <p>{{ $tool->admission_date }} </p>
                                </div>
                                <div class="form-group col-3">
                                    <label for="admission_date">CATEGORÍA</label>
                                    <p>{{ $tool->category->name }} </p>
                                </div>
                                <div class="form-group col-3">
                                    <label for="model">UBICACIÓN</label>
                                    <p>{{ $tool->location->name }} </p>
                                </div>
                                <div class="form-group col-3">
                                    <label for="model">UNIDAD</label>
                                    <p>{{ $tool->unit->name }} </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-outline card-primary shadow col-11">
                        <div class="card-header">
                            <h5><b>Datos de prestamo</b></h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row mb-2">
                                        <input type="hidden" name="tool_id" value="{{ $tool->id }}">
                                        <div class="col-sm-4">
                                            <label for="user">USUARIO A PRESTAR</label>
                                            <div class="input-group form-group">
                                                <span class="input-group-text"><i class="fa-solid fa-user-check"></i></span>
                                                <select name="borrower_user_id" class="form-control" required>
                                                    <option disabled selected>Seleccione a qué usuario desea prestar
                                                    </option>
                                                    @if (old('borrower_user_id'))
                                                        <option value="{{ old('borrower_user_id') }}">
                                                            {{ old('borrower_user_id') }}</option>
                                                    @endif
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('borrower_user_id')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="date_time_loan">FECHA HORA PRÉSTAMO</label>
                                            <div class="input-group form-group">
                                                <span class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
                                                <input name="date_time_loan" type="datetime-local" class="form-control"
                                                    required>
                                            </div>
                                            @error('date_time_loan')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="expected_return_date">FECHA HORA DEVOLUCIÓN ESPERADA</label>
                                            <div class="input-group form-group">
                                                <span class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
                                                <input name="expected_return_date" type="datetime-local"
                                                    class="form-control">
                                            </div>
                                            @error('expected_return_date')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <label for="observations">OBSERVACIONES</label>
                                            <div class="form-group input-group">
                                                <span class="input-group-text"><i class="fa-solid fa-file-lines"></i></span>
                                                <textarea name="observations" rows=2 class="form-control" placeholder="Ingrese su observación">{{ old('observations') }}</textarea>
                                            </div>
                                            @error('observations')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
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
                                    <i class="fa-solid fa-save mr-2"></i><span class="hidden-xs">Realizar préstamo</span>
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
