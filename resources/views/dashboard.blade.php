@extends('adminlte::page')

@section('title', 'SIS-Inventario | dashboard')

@section('content_header')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h4><b>DASHBOARD</b></h4>
        </div>
    </div>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="row col-10">
            {{-- Usuarios --}}
            @can('listar usuarios')
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
                        <a href="{{ route('user.index') }}" class="small-box-footer">
                            Mas información<i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            @endcan

            {{-- Roles --}}
            @can('listar roles')
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
                        <a href="{{ route('role.index') }}" class="small-box-footer">
                            Mas información<i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            @endcan

            {{-- Permisos --}}
            @can('listar permisos')
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
                        <a href="{{ route('permission.index') }}" class="small-box-footer">
                            Mas información<i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            @endcan

            {{-- Categorias --}}
            @can('listar categorias')
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
                        <a href="{{ route('category.index') }}" class="small-box-footer">
                            Mas información<i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            @endcan

            {{-- Ubicaciones --}}
            @can('listar ubicaciones')
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
                        <a href="{{ route('location.index') }}" class="small-box-footer">
                            Mas información<i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            @endcan

            {{-- Estados --}}
            @can('listar estados')
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            @php
                                $states_counters = 0;
                            @endphp
                            @foreach ($states as $state)
                                @php
                                    $states_counters++;
                                @endphp
                            @endforeach
                            <h3>{{ $states_counters }}</h3>
                            <p>Estados Registrados</p>
                        </div>
                        <div class="icon">
                            <i class="fas"><i class="fa fa-user-times"></i></i>
                        </div>
                        <a href="{{ route('states.index') }}" class="small-box-footer">
                            Mas información<i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            @endcan

            {{-- Activos --}}
            @can('listar activos')
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            @php
                                $assets_counters = 0;
                            @endphp
                            @foreach ($assets as $asset)
                                @php
                                    $assets_counters++;
                                @endphp
                            @endforeach
                            <h3>{{ $assets_counters }}</h3>
                            <p>Activos Registrados</p>
                        </div>
                        <div class="icon">
                            <i class="fas"><i class="fa fa-newspaper"></i></i>
                        </div>
                        <a href="{{ route('asset.index') }}" class="small-box-footer">
                            Mas información<i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            @endcan

            {{-- Herramientas --}}
            @can('listar herramientas')
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-cyan">
                        <div class="inner">
                            @php
                                $tools_counters = 0;
                            @endphp
                            @foreach ($tools as $tool)
                                @php
                                    $tools_counters++;
                                @endphp
                            @endforeach
                            <h3>{{ $tools_counters }}</h3>
                            <p>Herramientas Registrados</p>
                        </div>
                        <div class="icon">
                            <i class="fas"><i class="fa-solid fa-tools"></i></i>
                        </div>
                        <a href="{{ route('tools.index') }}" class="small-box-footer">
                            Mas información<i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            @endcan

            {{-- Préstamos --}}
            @can('listar prestamos')
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-green">
                        <div class="inner">
                            @php
                                $loans_counters = 0;
                            @endphp
                            @foreach ($loans as $loan)
                                @php
                                    $loans_counters++;
                                @endphp
                            @endforeach
                            <h3>{{ $loans_counters }}</h3>
                            <p>Préstamos Registrados</p>
                        </div>
                        <div class="icon">
                            <i class="fas"><i class="fa-solid fa-share-from-square"></i></i>
                        </div>
                        <a href="{{ route('loans.index') }}" class="small-box-footer">
                            Mas información<i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            @endcan

            {{-- CharJS --}}
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card card-outline card-primary">
                            <div class="card-header with-border">
                                <h3 class="card-title">Tus Préstamos por meses</h3>
                            </div>
                            <div class="card-body">
                                <div>
                                    <canvas id="myChart1"></canvas>
                                </div>
                            </div>
                        </div>
                        @php
                            $meses = [
                                '01' => 0,
                                '02' => 0,
                                '03' => 0,
                                '04' => 0,
                                '05' => 0,
                                '06' => 0,
                                '07' => 0,
                                '08' => 0,
                                '09' => 0,
                                '10' => 0,
                                '11' => 0,
                                '12' => 0,
                            ];

                            foreach ($your_loans as $your_loan) {
                                $fecha = strtotime($your_loan->date_time_loan);
                                $mes = date('m', $fecha);
                                if (isset($meses[$mes])) {
                                    $meses[$mes]++;
                                }
                            }

                            $reporte_meses = json_encode(array_values($meses));
                        @endphp
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                var datos = <?= $reporte_meses ?>;
                                const ctx1 = document.getElementById('myChart1').getContext('2d');

                                new Chart(ctx1, {
                                    type: 'line',
                                    data: {
                                        labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto',
                                            'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                                        ],
                                        datasets: [{
                                            label: 'Tus préstamos por meses',
                                            data: datos,
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        }
                                    },
                                });
                            });
                        </script>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-outline card-info">
                            <div class="card-header with-border">
                                <h3 class="card-title">Activos por Usuario</h3>
                            </div>
                            <div class="card-body">
                                <div>
                                    <canvas id="myChart2"></canvas>
                                </div>
                            </div>
                        </div>

                        @php
                            $activos_por_usuario = DB::table('assets')
                                ->join('users', 'assets.user_id', '=', 'users.id')
                                ->select('users.name', DB::raw('count(assets.id) as activos_count'))
                                ->groupBy('users.name')
                                ->get();

                            $usuarios = [];
                            $activos = [];

                            foreach ($activos_por_usuario as $usuario) {
                                $usuarios[] = $usuario->name;
                                $activos[] = $usuario->activos_count;
                            }

                            $labels = json_encode($usuarios);
                            $data = json_encode($activos);
                        @endphp

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                var labels = <?= $labels ?>;
                                var data = <?= $data ?>;

                                const ctx1 = document.getElementById('myChart2').getContext('2d');

                                new Chart(ctx1, {
                                    type: 'pie',
                                    data: {
                                        labels: labels,
                                        datasets: [{
                                            label: 'Activos asignados',
                                            data: data,
                                            backgroundColor: [
                                                'rgb(255, 99, 132)',
                                                'rgb(54, 162, 235)',
                                                'rgb(255, 205, 86)',
                                                'rgb(75, 192, 192)',
                                                'rgb(153, 102, 255)',
                                                'rgb(201, 203, 207)'
                                            ],
                                            hoverOffset: 4
                                        }]
                                    },
                                    options: {
                                        plugins: {
                                            datalabels: {
                                                color: '#fff',
                                                font: {
                                                    weight: 'bold',
                                                    size: 20
                                                },
                                                formatter: function(value, context) {
                                                    return value;
                                                },
                                                anchor: 'end',
                                                align: 'start',
                                                offset: 10
                                            }
                                        }
                                    }
                                });
                            });
                        </script>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-outline card-info">
                            <div class="card-header with-border">
                                <h3 class="card-title">Herramientas por Usuario</h3>
                            </div>
                            <div class="card-body">
                                <div>
                                    <canvas id="myChart3"></canvas>
                                </div>
                            </div>
                        </div>

                        @php
                            $herramientas_por_usuario = DB::table('tools')
                                ->join('users', 'tools.user_id', '=', 'users.id')
                                ->select('users.name', DB::raw('count(tools.id) as herramientas_count'))
                                ->groupBy('users.name')
                                ->get();

                            $usuarios = [];
                            $herramientas = [];

                            foreach ($herramientas_por_usuario as $usuario) {
                                $usuarios[] = $usuario->name;
                                $herramientas[] = $usuario->herramientas_count;
                            }

                            $labels = json_encode($usuarios);
                            $data = json_encode($herramientas);
                        @endphp

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                var labels = <?= $labels ?>;
                                var data = <?= $data ?>;

                                const ctx2 = document.getElementById('myChart3').getContext('2d');

                                new Chart(ctx2, {
                                    type: 'pie',
                                    data: {
                                        labels: labels,
                                        datasets: [{
                                            label: 'Herramientas asignadas',
                                            data: data,
                                            backgroundColor: [
                                                'rgb(255, 99, 132)',
                                                'rgb(54, 162, 235)',
                                                'rgb(255, 205, 86)',
                                                'rgb(75, 192, 192)',
                                                'rgb(153, 102, 255)',
                                                'rgb(201, 203, 207)'
                                            ],
                                            hoverOffset: 4
                                        }]
                                    },
                                    options: {
                                        plugins: {
                                            datalabels: {
                                                color: '#fff',
                                                font: {
                                                    weight: 'bold',
                                                    size: 20
                                                },
                                                formatter: function(value, context) {
                                                    return value;
                                                },
                                                anchor: 'end',
                                                align: 'start',
                                                offset: 10
                                            }
                                        }
                                    }
                                });
                            });
                        </script>
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
