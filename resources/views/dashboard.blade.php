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
                    <a href="{{ route('role.index') }}" class="small-box-footer">
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
                    <a href="{{ route('permission.index') }}" class="small-box-footer">
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
                    <a href="{{ route('category.index') }}" class="small-box-footer">
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
                    <a href="{{ route('location.index') }}" class="small-box-footer">
                        Mas información<i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            {{-- Activos --}}
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

            {{-- Herramientas --}}
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

            {{-- Préstamos --}}
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
                                <h3 class="card-title">Préstamos</h3>
                            </div>
                            <div class="card-body">
                                <div>
                                    <canvas id="myChart2"></canvas>
                                </div>
                            </div>
                        </div>
                        @php
                            $devueltos = 0;
                            $sin_devolver = 0;
                            foreach ($your_loans as $your_loan) {
                                if ($your_loan->isBorrowed) {
                                    $sin_devolver++;
                                } else {
                                    $devueltos++;
                                }
                            }
                            $datos = json_encode([$devueltos, $sin_devolver]);
                        @endphp
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                var datos = <?= $datos ?>;
                                console.log(datos);
                                const ctx2 = document.getElementById('myChart2').getContext('2d');
                                new Chart(ctx2, {
                                    type: 'pie',
                                    data: {
                                        labels: [
                                            'Herramientas devueltas',
                                            'Herramientas prestadas sin devolver'
                                        ],
                                        datasets: [{
                                            label: 'Estado de los préstamos',
                                            data: datos,
                                            backgroundColor: [
                                                'rgb(255, 99, 132)',
                                                'rgb(54, 162, 235)'
                                            ],
                                            hoverOffset: 4
                                        }]
                                    },
                                    options: {
                                        plugins: {
                                            datalabels: {
                                                color: '#fff', // Puedes ajustar el color del texto según sea necesario
                                                font: {
                                                    weight: 'bold',
                                                    size: 20
                                                },
                                                formatter: function(value, context) {
                                                    return value;
                                                },
                                                anchor: 'end', // Posición del texto
                                                align: 'start', // Alineación del texto
                                                offset: 10 // Espacio entre el borde y el texto
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
