@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Actualizar categoria</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('category.update', $category) }}" method="post">
                        @csrf {{-- Guarda los datos para y genera un token  --}}
                        @method('PUT')
                        <x-adminlte-input type="text" name="name" label="Nombre" label-class="text-primary"
                            value="{{ $category->name }}" required>
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="zmdi zmdi-pin-drop text-primary"></i>
                                </div>
                            </x-slot>
                        </x-adminlte-input>

                        <x-adminlte-textarea name="description" label="Descripción" rows=5 label-class="text-primary">
                            <x-slot name="prependSlot">
                                <div class="input-group-text">
                                    <i class="fas fa-lg fa-file-alt text-primary"></i>
                                </div>
                            </x-slot>
                            {{ $category->description }}
                        </x-adminlte-textarea>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="btn-group pull-right me-2">
                                    <button type="submit" class="btn btn-sm btn-primary" title="Actualizar">
                                        <i class="zmdi zmdi-check-square mr-2"></i><span class="hidden-xs">Actualizar</span>
                                    </button>
                                </div>
                                <div class="btn-group pull-right me-2">
                                    <a href="{{ route('category.index', []) }}" class="btn btn-sm btn-secondary"
                                        title="Cancelar">
                                        <i class="zmdi zmdi-undo mr-2"></i><span class="hidden-xs">Cancelar</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
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
