<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: sans-serif;
            text-align: justify;
            margin: 0;
            padding-top: 0;
            /* Añadir espacio para el encabezado */
            padding-bottom: 0;
            /* Añadir espacio para el pie de página */
        }

        @page {
            margin: 160px 50px;
        }

        header {
            position: fixed;
            left: 0px;
            top: -160px;
            right: 0px;
            height: 100px;
            color: rgb(79, 129, 188);
            text-align: center;
        }

        header table {
            margin: 0 0;
        }

        header table thead tr td h4 {
            margin: 0;
            padding: 0px;
            font-size: larger;
            font-weight: normal;
        }

        header table thead tr td p {
            margin: 0;
            padding: 0px;
            font-size: 14px;
            font-weight: lighter;
        }

        header table thead tr td .barra {
            height: 3px;
            width: 95%;
            margin: 4px auto 12px;
            background-color: rgb(79, 129, 188);
            box-shadow: 3px 6px 2px -2px rgb(19, 18, 18);
        }

        footer {
            position: fixed;
            left: 0px;
            bottom: -30px;
            right: 0px;
            height: 50px;
            color: rgb(79, 129, 188);
            text-align: center;
        }

        footer table {
            width: 100%;
            margin: 10px 0;
        }

        footer table thead tr td h4 {
            margin: 0;
            padding: 0px;
            font-size: 10px;
            font-weight: lighter;
        }

        footer table thead tr td p {
            margin: 0;
            padding: 0px;
            font-size: 10px;
            font-weight: lighter.
        }

        footer table thead tr td .barra {
            height: 2px;
            width: 100%;
            margin: 4px auto 2px;
            background-color: rgb(79, 129, 188);
            box-shadow: 3px 6px 2px -2px rgb(19, 18, 18);
        }

        #content {
            min-height: calc(100% - 180px);
            /* Ajustar para que no ocupe espacio adicional */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            /* Asegura que las firmas no queden al final, evitando salto de página */
        }

        #content table {
            border-collapse: collapse;
            width: 100%;
            margin: 0px;
            table-layout: auto;
            font-size: 14px;
            padding: 0 0;
        }

        #content table thead tr th,
        #content table tbody tr td {
            border: 1px solid black;
            padding: 4px;
            text-align: center;
            word-wrap: break-word;
            /* Permite que el texto se ajuste en varias líneas */
        }

        #content table tbody tr,
        #content table tbody tr td {
            page-break-inside: avoid;
            /* Evita que se dividan las filas en diferentes páginas */
        }

        .firmas-container {
            margin-top: auto;
            font-weight: bold;
            width: 100%;
            padding-top: 20px;
            /* Reduce espacio en blanco antes de las firmas */
        }

        .firmas-container table {
            border: none;
            text-align: center;
            width: 100%;
        }

        .firmas-container table tr th {
            border: none;
            padding: 20px;
            font-size: 16px;
            padding-top: 100px;
        }

        .firmas {
            border-top: 1px solid black;
            padding-top: 5px;
            display: block;
            width: 300px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>
    <header>
        <table border="0">
            <thead>
                <tr>
                    <td><img src="{{ public_path('images/logo-epdb.png') }}" alt="logo-epdb" width="130px"></td>
                    <td width='450px' style="text-align:center; align-content: center; vertical-align:bottom;">
                        <h4>Estado Plurinacional de Bolivia</h4>
                        <p>Empresa Estatal de Transporte Por Cable "Mi Teleférico"</p>
                        <div class="barra"></div>
                    </td>
                    <td><img src="{{ public_path('images/logo-teleferico.png') }}" alt="logo-teleferico" width="130px"></td>
                </tr>
            </thead>
        </table>
    </header>
    <footer>
        <table border="0">
            <thead>
                <tr>
                    <td width="110px"></td>
                    <td width='450px' style="text-align:center; align-content: center; vertical-align:bottom;">
                        <div class="barra"></div>
                        <h4>{{ $settings->address }} - Teléfono: {{ $settings->phone_number }}</h4>
                        <p style="text-decoration: underline">{{ $settings->website }}</p>
                        <p>La Paz - Bolivia</p>
                    </td>
                    <td><img src="{{ public_path('images/logo-10años.png') }}" alt="logo-teleferico" width="110px"></td>
                </tr>
            </thead>
        </table>
    </footer>
    <div id="content">
        <h3 style="text-decoration: underline; padding: 0 0; text-align: center;">REPORTE DE HERRAMIENTAS</h3>
        <table>
            <thead>
                <tr>
                    <th scope="col">Nro</th>
                    <th scope="col">IMAGEN</th>
                    <th scope="col">CÓDIGO</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">ESTADO</th>
                    <th scope="col">CATEGORÍA</th>
                    <th scope="col">UBICACIÓN</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tools as $tool)
                    <tr>
                        <td scope="row">{{ $loop->iteration }}</td>
                        <td><span class="bg-light inline rounded-circle user-image">
                                <img src="{{ $tool->image }}" width="50px">
                            </span>
                        </td>
                        <td scope="row">{{ $tool->code }}</td>
                        <td scope="row">{{ $tool->name }}</td>
                        <td scope="row">{{ $tool->state->name }}</td>
                        <td scope="row">{{ $tool->category->name }}</td>
                        <td scope="row">{{ $tool->location->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="firmas-container">
            <table border="0">
                <tr>
                    <th><span class="firmas">{{ Auth::user()->name . ' ' . Auth::user()->last_name }}
                            <br>PERTENECIENTE AL PERSONAL
                        </span></th>
                    {{-- <th><span class="firmas">{{ $loan->user->name . ' ' . $loan->user->last_name }}
                            <br>PRESTADO AL PERSONAL
                        </span></th> --}}
                </tr>
            </table>
        </div>
    </div>
</body>

</html>
