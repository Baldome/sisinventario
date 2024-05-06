@extends('adminlte::page')

@section('title', 'SIS-Inventario | Categorias')

@section('content_header')
    <h1>Administracion de Categorias</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-tools">
                <div class="btn-group pull-right me-2">
                    <a href="{{ route('category.create', []) }}" class="btn btn-sm btn-primary" title="Crear">
                        <i class="zmdi zmdi-plus mr-2"></i><span class="hidden-xs">Crear</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            {{-- Setup data for datatables --}}
            @php
                $heads = ['Nro', 'Nombre', 'Descripción', ['label' => 'Acciones', 'no-export' => true, 'width' => 15]];

                $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Eliminar">
                  <i class="fa fa-lg fa-fw fa-trash"></i>
              </button>';
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
                @foreach ($categories as $category)
                    @php
                        $counter++;
                    @endphp
                    <tr>
                        <td>{{ $counter }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td><a href="{{ route('category.edit', [$category]) }}"
                                class="btn btn-xs btn-default text-primary mx-1 shadow" title="Editar">
                                <i class="fa fa-lg fa-fw fa-pen"></i>
                            </a>
                            <form style="display: inline" action="{{ route('category.destroy', [$category]) }}"
                                method="post" onclick="ask{{ $category->id }}(event)" id="myform{{ $category->id }}">
                                @csrf
                                @method('DELETE')
                                {!! $btnDelete !!}
                            </form>
                            <script>
                                function ask{{ $category->id }}(event) {
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
                                            var form = $('#myform{{ $category->id }}');
                                            form.submit();
                                        }
                                    });
                                }
                            </script>
                            <a href="{{ route('category.show', [$category]) }}"
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
