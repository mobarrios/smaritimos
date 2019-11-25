<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bugs</title>

    <style>
        *{
            padding:0;
            margin: 0;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            font-size: 11px;
        }

        body {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            font-family: Helvetica,Arial,sans-serif;
            font-weight: 400;
            overflow-x: hidden;
            overflow-y: auto;
            width: 100%;
            margin: auto;

        }

        html, body {
            min-height: 100%;

        }

        body {
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
            font-size: 14px;
            line-height: 1.42857143;
            color: #333;
            background-color: #fff;
        }


        html {
            font-size: 10px;
            -webkit-tap-highlight-color: rgba(0,0,0,0);
        }

        .row {
            margin-right: 20px;
            margin-left: 20px;
        }


        /*Tablas*/
        .table {
            width: 100%;
            margin-bottom: 20px;
        }

        table {
            background-color: transparent;
        }

        table {
            border-spacing: 0;
            border-collapse: collapse;
            border: 1px solid #ddd;
            margin: 10px 0;
        }


        table.no-border {
            border-spacing: 0;
            border-collapse: collapse;
            border: none;
        }

        .table>thead:first-child>tr:first-child>th {
            border-top: 0;
        }

        .table>thead>tr>th {
            border-bottom: 2px solid #f4f4f4;
        }

        .table>thead>tr>th, .table>tbody>tr>th, .table>tfoot>tr>th, .table>thead>tr>td, .table>tbody>tr>td, .table>tfoot>tr>td {
            border-top: 1px solid #f4f4f4;
        }

        .table>thead>tr>th {
            vertical-align: bottom;
            border-bottom: 2px solid #ddd;
        }

        .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
            padding: 8px;
            line-height: 1.42857143;
            vertical-align: top;
            border-top: 1px solid #ddd;
        }

        th {
            text-align: left;
        }

        td, th {
            padding: 0;
            margin-top:5px !important;
        }

        .no-border>tbody>tr>td, .no-border>tbody>tr>th, .no-border>tfoot>tr>td, .no-border>tfoot>tr>th, .no-border>thead>tr>td, .no-border>thead>tr>th{
            border: none !important;
        }

        .table-striped>thead>tr:nth-child(2) {
            background-color: #f9f9f9;
        }


        .blue{
            color: #3498db;
        }

        .fs15{
            font-size: 15pt;
        }

        .fs20
        {
            font-size: 20pt;
        }

        .bold{
            font-weight: bold;
        }

        .upper{
            text-transform: uppercase;
        }


        .bloque1{
            width:100%;
        }

        .col-xs-12 {
            width: 100%;
        }

        .col-xs-6 {
            width: 50%;
        }

        .col-xs-2 {
            width: 16.66666667%;
        }

        hr{
            margin-top: 10px !important;
            margin-bottom: 10px !important;;
        }

        .fecha span{
            border: 1px solid #bcbcbc;
            color: #4f4f4f;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            width: 40px;
            height: 40px;
            display:inline-block;
            vertical-align: middle;
            font-size: 15px;
            line-height: 40px;
            text-align:center;
            margin:0 3px;
        }

        .mt-40{
            margin-top: 40px;
        }



    </style>

</head>


<body>
    <div class="row mt-40">
        <table class="bloque1 no-border col-xs-12">
            <tr>
                <td class="col-xs-4 text-center">
                    <p class="bold fs15" style="text-align: center">Reporte desde <b class="blue fs15">{!! $data['url'] !!}</b></p>
                </td>
            </tr>
        </table>
    </div>


    <div class="row">

        <table class="bloque1 no-border table table-striped col-xs-12">
            <tr bgcolor="#d3d3d3">
                <th class="col-xs-2">
                    URL
                </th>
                <th class="col-xs-2">
                    URL previa
                </th>
                <th class="col-xs-2">
                    Método
                </th>
                <th class="col-xs-2">
                    Código
                </th>
                <th class="col-xs-2">
                    Mensaje
                </th>
                <th class="col-xs-2">
                    Archivo
                </th>

            </tr>

            <tr>
                <td class="col-xs-2">
                    {!! $data['url'] !!}
                </td>

                <td class="col-xs-2">
                    {!! $data['previous'] !!}
                </td>

                <td class="col-xs-2">
                    {!! $data['method'] !!}
                </td>

                <td class="col-xs-2">
                    {!! $data['code'] !!}
                </td>

                <td class="col-xs-2">
                    {!! $data['message'] !!}
                </td>

                <td class="col-xs-2">
                    <ul>
                        @forelse($data['trace'] as $trace)
                            <li><b>Error:</b> {!! $trace['file'] !!} <b> - Linea:</b> {!! $trace['line'] !!}</li>
                        @empty

                        @endforelse
                    </ul>
                </td>

            </tr>

        </table>

    </div>

</body>
</html>
