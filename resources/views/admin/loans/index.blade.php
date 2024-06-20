@extends('adminlte::page')

@section('title', 'SIS-Inventario | Préstamos')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h4><b>SEGUIMIENTO DE PRÉSTAMO DE HERRAMIENTAS</b></h4>
        </div>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-border col-md-12">
                <div class="card-header with-border">
                    <h3 class="card-title"><b>Tus herramientas prestadas y devueltos</b></h3>
                </div>
                <div class="card-body">
                    @php
                        $heads = [
                            '#',
                            'Nombre herramienta',
                            'Prestado a usuario',
                            'Fecha hora préstamo',
                            'Fecha devolución esperada',
                            'Fecha hora devolución',
                            'Estado',
                            'Observaciones',
                            ['label' => 'Acciones', 'no-export' => true, 'width' => 8],
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
                                <td>{{ \App\Models\User::find($loan->borrower_user_id)->name }}</td>
                                <td>{{ $loan->date_time_loan }}</td>
                                <td>{{ $loan->expected_return_date }}</td>
                                <td>{{ $loan->date_time_return }}</td>
                                <td>
                                    @if ($loan->isBorrowed)
                                        <span class="badge text-xs bg-danger">Sin devolver</span>
                                    @else
                                        <span class="badge text-xs bg-green">Devuelto</span>
                                    @endif
                                </td>
                                <td>{{ $loan->observations }}</td>
                                <td>
                                    <a href="{{ route('loans.show', [$loan->loan_id]) }}"
                                        class="btn btn-sm btn-default text-warning mx-1 shadow" title="Detalles">
                                        <i class="fa fa-lg fa-fw fa-eye"></i>
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
