@extends('adminlte::page')

@section('title', 'SIS-Inventario | detalles del préstamo')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4><b>DETALLES DEL PRÉSTAMO</b></h4>
        </div>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary shadow col-md-12">
                        <div class="card-header with-border">
                            <h3 class="card-title">Datos registrados de la herramientas prestada:
                                <b>{{ $loan->tool->name }}</b>
                            </h3>
                            <div class="card-tools">
                                <div class="btn-group pull-right">
                                    <a href="{{ route('loans.index') }}" class="btn btn-sm btn-primary" title="Listar">
                                        <i class="fa-solid fa-list mr-2"></i><span class="hidden-xs">Listar préstamos</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="form-horizontal">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <label class="col-sm-3 form-label">ID</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $loan->id }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 form-label">NOMBRE HERRAMIENTA</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $loan->tool->name }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 form-label">PRESTADO A USUARIO</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $loan->user->name }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 form-label">FECHA PRÉSTAMO</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $loan->date_time_loan }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 form-label">FECHA DOVOLUCIÓN ESPERADA</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $loan->expected_return_date }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 form-label">FECHA DOVOLUCIÓN</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $loan->date_time_return }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 form-label">ESTADO DE PRÉSTAMO</label>
                                            <div class="col-sm-9 show-value">
                                                @if ($loan->isBorrowed)
                                                    <span class="badge bg-danger">Prestado</span>
                                                @else
                                                    <span class="badge bg-success">Devuelto</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 form-label">OBSERVACIONES</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $loan->observations }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 form-label">FECHA CREADA REGISTRO</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $loan->created_at }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 form-label">FECHA ACTUALIZADA REGISTRO</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $loan->updated_at }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
    <script>
        function ask{{ $loan->id }}(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Eliminar registro',
                text: '¿Desea eliminar este registro?',
                icon: 'question',
                showDenyButton: true,
                confirmButtonText: 'Eliminar',
                confirmButtonColor: 'red',
                denyButtonColor: '#270a0a',
                denyButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    var form = $('#myform{{ $loan->id }}');
                    form.submit();
                }
            });
        }
    </script>
@stop
