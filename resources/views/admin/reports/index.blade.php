@extends('adminlte::page')

@section('title', 'SIS-Inventario | Configuraciones')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h4><b>GENERAR REPORTES</b></h4>
        </div>
    </div>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">

                    <div class="col-md-3">
                        <div class="card card-primary card-outline direct-chat direct-chat-primary">
                            <div class="card-header">
                                <h3 class="card-title">Generar Reporte de Activos</h3>
                            </div>
                            <div class="card-body d-flex justify-content-center p-3">
                                <a href="{{ route('reports.generateReportAsset') }}" type="button"
                                    class="btn btn-primary">Generar
                                    reporte
                                    <i class="fa-solid fa-file-pdf fa-lg"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card card-primary card-outline direct-chat direct-chat-primary">
                            <div class="card-header">
                                <h3 class="card-title">Generar Reporte de Herramientas</h3>
                            </div>
                            <div class="card-body d-flex justify-content-center p-3">
                                <a href="{{ route('reports.generateReportTool') }}" type="button"
                                    class="btn btn-primary">Generar reporte
                                    <i class="fa-solid fa-file-pdf fa-lg"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card card-primary card-outline direct-chat direct-chat-primary">
                            <div class="card-header">
                                <h3 class="card-title">Generar Reporte de Prestamos por Fechas</h3>
                            </div>
                            <div class="card-body">
                                {{-- Formulario para seleccionar las fechas --}}
                                <form action="{{ route('reports.generateReportForDates') }}" method="GET">
                                    @csrf
                                    <div class="row p-2">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="fechaInicio">Fecha de Inicio</label>
                                                <input type="date" class="form-control" id="fechaInicio"
                                                    name="fechaInicio" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="fechaFin">Fecha de Fin</label>
                                                <input type="date" class="form-control" id="fechaFin" name="fechaFin"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-4 d-flex align-items-center">
                                            <button type="submit" class="btn btn-primary w-100">
                                                Generar Reporte <i class="fa-solid fa-file-pdf fa-lg"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card card-primary card-outline direct-chat direct-chat-primary">
                            <div class="card-header">
                                <h3 class="card-title">Generar Reporte de Prestamos</h3>
                            </div>
                            <div class="card-body d-flex justify-content-center p-3">
                                <a href="{{ route('reports.generateReportLoan') }}" type="button"
                                    class="btn btn-primary">Generar reporte
                                    <i class="fa-solid fa-file-pdf fa-lg"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
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
