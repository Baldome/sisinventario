@extends('adminlte::page')

@section('title', 'SIS-Inventario | dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row mt-2">
        {{-- Usuarios --}}
        <div class="col-lg-3 col-6">
            <div class="small-box bg-cyan">
                <div class="inner">
                    @php
                        $users_counters = 0;
                    @endphp
                    @foreach ($users as $user)
                        @php
                            $users_counters++;
                        @endphp
                    @endforeach
                    <h3>{{ $users_counters }}</h3>
                    <p>Usuarios Registrados</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{ url('/admin/usuarios', []) }}" class="small-box-footer">
                    Mas información<i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        {{-- Roles --}}
        <div class="col-lg-3 col-6">
            <div class="small-box bg-green">
                <div class="inner">
                    @php
                        $roles_counters = 0;
                    @endphp
                    @foreach ($roles as $role)
                        @php
                            $roles_counters++;
                        @endphp
                    @endforeach
                    <h3>{{ $roles_counters }}</h3>
                    <p>Roles Registrados</p>
                </div>
                <div class="icon">
                    <i class="fas"><i class="fa fa-user"></i></i>
                </div>
                <a href="{{ url('/admin/roles', []) }}" class="small-box-footer">
                    Mas información<i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        {{-- Permisos --}}
        <div class="col-lg-3 col-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    @php
                        $permissions_counters = 0;
                    @endphp
                    @foreach ($permissions as $permission)
                        @php
                            $permissions_counters++;
                        @endphp
                    @endforeach
                    <h3>{{ $permissions_counters }}</h3>
                    <p>Permisos Registrados</p>
                </div>
                <div class="icon">
                    <i class="fas"><i class="fa fa-user-times"></i></i>
                </div>
                <a href="{{ url('/admin/permissions', []) }}" class="small-box-footer">
                    Mas información<i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        {{-- Categorias --}}
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    @php
                        $categories_counters = 0;
                    @endphp
                    @foreach ($categories as $category)
                        @php
                            $categories_counters++;
                        @endphp
                    @endforeach
                    <h3>{{ $categories_counters }}</h3>
                    <p>Categorias Registrados</p>
                </div>
                <div class="icon">
                    <i class="fas"><i class="fa fa-tag"></i></i>
                </div>
                <a href="{{ url('/admin/category', []) }}" class="small-box-footer">
                    Mas información<i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        {{-- Ubicaciones --}}
        <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
                <div class="inner">
                    @php
                        $locations_counters = 0;
                    @endphp
                    @foreach ($locations as $category)
                        @php
                            $locations_counters++;
                        @endphp
                    @endforeach
                    <h3>{{ $locations_counters }}</h3>
                    <p>Ubicaciones Registrados</p>
                </div>
                <div class="icon">
                    <i class="fas"><i class="fa fa-map-marker"></i></i>
                </div>
                <a href="{{ url('/admin/location', []) }}" class="small-box-footer">
                    Mas información<i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
