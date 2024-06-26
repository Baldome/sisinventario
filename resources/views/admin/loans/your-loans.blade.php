@extends('adminlte::page')

@section('title', 'SIS-Inventario | Préstamos')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h4><b>HERRAMIENTAS PRESTADOS POR OTROS USUARIOS</b></h4>
        </div>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-outline card-primary shadow col-md-12">
                <div class="card-header with-border">
                    <b>
                        <h3 class="card-title"><b>Tus herramientas prestadas</b></h3>
                    </b>
                </div>
                <div class="card-body">
                    @php
                        $heads = [
                            'Nro',
                            'Nombre herramienta',
                            'Prestado del usuario',
                            'Fecha hora préstamo',
                            'Fecha devolución esperada',
                            'Observaciones',
                            ['label' => 'Acciones', 'no-export' => true, 'width' => 15],
                        ];
                        $config = [
                            'language' => [
                                'url' => '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                            ],
                        ];
                    @endphp
                    <x-adminlte-datatable id="table7" :heads="$heads" head-theme="light" :config="$config" striped
                        hoverable bordered compressed with-buttons>
                        @php
                            $counter = 0;
                        @endphp
                        @foreach ($loans as $loan)
                            @php
                                $counter++;
                            @endphp
                            <tr>
                                <td>{{ $counter }}</td>
                                <td>{{ $loan->name }}</td>
                                <td>{{ $loan->user_name }}</td>
                                <td>{{ $loan->date_time_loan }}</td>
                                <td>{{ $loan->expected_return_date }}</td>
                                <td>{{ $loan->observations }}</td>
                                <td style="text-align: center; align-content: center">
                                    <a href="{{ route('loans.edit', [$loan->loan_id]) }}"
                                        class="btn btn-sm btn-default text-primary shadow">
                                        <i class="fa-solid fa-rotate-left mr-2"></i><b>Devolver</b>
                                    </a>
                                    <a href="{{ route('loans.show', [$loan->loan_id]) }}"
                                        class="btn btn-sm btn-default text-warning mx-1 shadow" title="Detalles">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </x-adminlte-datatable>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
