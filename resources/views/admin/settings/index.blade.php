@extends('adminlte::page')

@section('title', 'SIS-Inventario | Configuraciones')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4><b>ADMINISTRACIÓN DE CONFIGURACIONES</b></h4>
        </div>
    </div>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach ($settings as $setting)
                    <div class="card card-widget widget-user shadow">
                        <div class="widget-user-header bg-yellow">
                            <h2 class="widget-user-username mb-2"><b>{{ $setting->name }}</b></h2>
                            <h5 class="widget-user-desc"><b>MI TELEFÉRICO</b></h5>
                        </div>
                        <div class="widget-user-image mt-2">
                            <img class="img-circle elevation-2" src="{{ $setting->logo }}" alt="Logo institución">
                        </div>
                        <div class="card-footer">
                            <div class="row mb-2">
                                <div class="col-sm-3 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header mb-2">DIRECCIÓN</h5>
                                        <span>{{ $setting->address }}</span>
                                    </div>
                                </div>
                                <div class="col-sm-3 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header mb-2">TELÉFONO</h5>
                                        <span>{{ $setting->phone_number }}</span>
                                    </div>
                                </div>
                                <div class="col-sm-3 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header mb-2">CELULAR</h5>
                                        <span>{{ $setting->cell_phone }}</span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="description-block">
                                        <h5 class="description-header mb-2">CORREO ELECTRÓNICO</h5>
                                        <span>{{ $setting->email }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header mb-2">SITIO WEB</h5>
                                        <span><a href="{{ $setting->website }}" target="_blank">Ir
                                                al sitio web</a></span>
                                    </div>
                                </div>
                                <div class="col-sm-3 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header mb-2">FECHA DE FUNDACIÓN</h5>
                                        <span>{{ $setting->founding_date }}</span>
                                    </div>
                                </div>
                                <div class="col-sm-3 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header mb-2">ESTADO</h5>
                                        <span>
                                            @if ($setting->state)
                                                <span class="badge bg-success">Activo</span>
                                            @else
                                                <span class="badge bg-danger">Inactivo</span>
                                            @endif
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="description-block">
                                        <h5 class="description-header mb-2">ACCIONES</h5>
                                        <span>
                                            {{-- @can('editar unidad') --}}
                                            <a href="{{ route('settings.edit', $setting) }}"
                                                class="btn btn-sm btn-primary shadow">
                                                <i class="fa-solid fa-edit mr-2"></i>Editar
                                            </a>
                                            {{-- @endcan --}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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
