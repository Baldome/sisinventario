@extends('adminlte::page')

@section('title', 'SIS-Inventario | detalle categoria')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h4>Detalle de categoría : <span>{{ $category->name }}</span></h4>
        </div>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-border col-md-12">
                        <div class="card-header with-border">
                            <h3 class="card-title">Datos registrados</h3>
                            <div class="card-tools">
                                <form style="display: inline" action="{{ route('category.destroy', $category) }}"
                                    method="POST" onclick="ask{{ $category->id }}(event)" id="myform{{ $category->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <div class="btn-group pull-right me-2">
                                        <a class="btn btn-sm btn-danger delete" title="Eliminar">
                                            <i class="zmdi zmdi-delete mr-2"></i><span class="hidden-xs">Eliminar</span>
                                        </a>
                                    </div>
                                </form>
                                <div class="btn-group pull-right me-2">
                                    <a href="{{ route('category.edit', [$category]) }}" class="btn btn-sm btn-primary"
                                        title="Editar">
                                        <i class="zmdi zmdi-edit mr-2"></i><span class="hidden-xs">Editar</span>
                                    </a>
                                </div>
                                <div class="btn-group pull-right">
                                    <a href="{{ route('category.index') }}" class="btn btn-sm btn-secondary" title="Listar">
                                        <i class="zmdi zmdi-format-list-bulleted mr-2"></i><span
                                            class="hidden-xs">Listar</span>
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
                                                {{ $category->id }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 form-label">Nombre</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $category->name }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 form-label">Descripción</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $category->description }}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 form-label">Fecha creada</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $category->created_at }}
                                                {{-- <span class="badge bg-success">{{ $category->created_at }}</span> --}}
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-sm-3 form-label">Fecha actualizada</label>
                                            <div class="col-sm-9 show-value">
                                                {{ $category->updated_at }}
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
@stop
