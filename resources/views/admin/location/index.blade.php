@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Administracion de Ubicaciones</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-tools">
                <div class="btn-group pull-right me-2">
                    <a href="{{ route('location.create', []) }}" class="btn btn-sm btn-primary" title="Crear">
                        <i class="zmdi zmdi-plus mr-2"></i><span class="hidden-xs">Crear</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            {{-- Setup data for datatables --}}
            @php
                $heads = ['Nro', 'Nombre', 'Descripción', ['label' => 'Acciones', 'no-export' => true, 'width' => 15]];
                $btnEdit = '';
                $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
              </button>';
                $btnDetails = '';
                $config = [
                    'language' => [
                        'url' => '//cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                    ],
                ];
                // $config['dom'] = '<"row" <"col-sm-7" B> <"col-sm-5 d-flex justify-content-end" i> >
//   <"row" <"col-12" tr> >
//   <"row" <"col-sm-12 d-flex justify-content-start" f> >';
                // $config['paging'] = false;
                // $config['lengthMenu'] = [10, 50, 100, 500];
            @endphp

            {{-- @section('plugins.Datatables', true)
            @section('plugins.DatatablesPlugin', true) --}}

            <x-adminlte-datatable id="table7" :heads="$heads" head-theme="light" :config="$config" striped hoverable
                bordered compressed>
                @php
                    $counter = 0;
                @endphp
                @foreach ($locations as $location)
                    @php
                        $counter++;
                    @endphp
                    <tr>
                        <td>{{ $counter }}</td>
                        <td>{{ $location->name }}</td>
                        <td>{{ $location->description }}</td>
                        <td><a href="{{ route('location.edit', [$location]) }}"
                                class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </a>
                            <form style="display: inline" action="{{ route('location.destroy', [$location]) }}"
                                method="post" onclick="ask{{ $location->id }}(event)" id="myform{{ $location->id }}">
                                @csrf
                                @method('DELETE')
                                {!! $btnDelete !!}
                            </form>
                            <script>
                                function ask{{ $location->id }}(event) {
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
                                            var form = $('#myform{{ $location->id }}');
                                            form.submit();
                                        }
                                    });
                                }
                            </script>
                            <a href="{{ route('location.show', [$location]) }}"
                                class="btn btn-xs btn-default text-teal mx-1 shadow" title="Detalles">
                                <i class="fa fa-lg fa-fw fa-eye"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </x-adminlte-datatable>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-md-12">
                    <div class="btn-group pull-right me-2">
                        <a href="{{ route('dashboard', []) }}" class="btn btn-sm btn-secondary" title="Principal">
                            <i class="zmdi zmdi-menu mr-2"></i><span class="hidden-xs">Principal</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
@stop
