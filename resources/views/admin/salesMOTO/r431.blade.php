<!doctype html>
<html lang="en">

<head>
 <title>PDF</title>

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

     body {
         margin: 0;
     }

     html {
         font-size: 10px;
         -webkit-tap-highlight-color: rgba(0,0,0,0);
     }


     .img-responsive{
         width: 100%;
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
     }

     .no-border>tbody>tr>td, .no-border>tbody>tr>th, .no-border>tfoot>tr>td, .no-border>tfoot>tr>th, .no-border>thead>tr>td, .no-border>thead>tr>th{
         border: none;
     }

     .table-striped>thead>tr:nth-child(2) {
         background-color: #f9f9f9;
     }

     .colorWhite{
         color: white;
     }

     .bg-blue{
         background-color: #3498db;
     }

     .blue{
         color: #3498db;
     }

     #logo{
         width:150px;
     }


     .center-block{
         margin: auto;
     }

     .mb-40n{
         margin-bottom: -40px;
     }

     .mb-20{
         margin-bottom: 20px;
     }


     .text-danger{
         color: #a94442;
     }


     .mt100{
         margin-top: 100px;
     }

     .logo{
         font-size: 25pt;
         line-height: 110px;

     }


     .lh100{
         margin-top: 40px;
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

     .ml20{
         margin-left: 20px;
     }

     .separador{
         width:100%;
         height:1px;
         background: #9a9c9a;
         margin: 10px 0;
     }

     .border{
         padding-top: 5px !important;
         padding-bottom: 5px !important;
     }

     .border-bottom{
         border-bottom: 1px solid rgb(190, 190, 190);

     }

     .bloque1{
         width:100%;
     }

     .col-xs-12 {
         width: 100%;
     }
     .col-xs-11 {
         width: 91.66666667%;
     }
     .col-xs-10 {
         width: 83.33333333%;
     }
     .col-xs-9 {
         width: 75%;
     }
     .col-xs-8 {
         width: 66.66666667%;
     }
     .col-xs-7 {
         width: 58.33333333%;
     }
     .col-xs-6 {
         width: 50%;
     }
     .col-xs-5 {
         width: 41.66666667%;
     }
     .col-xs-4 {
         width: 33.33333333%;
     }
     .col-xs-3 {
         width: 25%;
     }
     .col-xs-2 {
         width: 16.66666667%;
     }
     .col-xs-1 {
         width: 8.33333333%;
     }

    .text-center{
        text-align: center;
    }

     hr{
         margin-top: 10px !important;
         margin-bottom: 10px !important;;
     }

     .ml20{
         margin-left: 20px !important;
     }

     .mb-20{
         margin-bottom: 20px !important;
         margin-top: 20px !important;
     }

     .mb-10{
         margin-bottom:10px;
     }

    .cierre{
        position:absolute;
        bottom: 30px;
        margin-right: 20px;
        margin-left: 20px;
        border:1px solid #ddd;
    }

    .container{
        margin: 30px 0;
    }

     .bloque1 tr td{
         padding:5px;
     }

     .bloque1 tr td{
         border-top: 2px solid #ddd !important;
         border-bottom: 2px solid #ddd !important;
     }

 </style>

</head>

<body>
    <div class="container">


        <div class="row">
            <h1 style="font-size:18pt;text-align: center;">Control Obligatorio de Pre Entrega</h1>
            <hr>

            <table class="bloque1 no-border">
                <tr>
                    <td class="col-xs-6">
                        <p>FECHA: {!! date('d/m/Y',time()) !!} </p>

                    </td>
                    <td class="col-xs-6 text-center">
                        <p>IMPRESO: {!! date('h:i:s',time()) !!} </p>
                    </td>

                </tr>
                <tr>
                    <td class="col-xs-6">
                        <p>MARCA: {!! $model->Items->first()->Models->Brands->name !!} </p>

                    </td>
                    <td class="col-xs-6 text-center">
                        <p>MODELO: {!! $model->Items->first()->Models->name !!} </p>
                    </td>

                </tr>
                <tr>
                    <td class="col-xs-7">
                        <p>VIN: {!! $model->Items->first()->n_chasis !!} </p>

                    </td>

                </tr>
                <tr>
                    <td class="col-xs-7">
                        <p>MOTOR: {!! $model->Items->first()->n_motor !!} </p>

                    </td>
                </tr>

            </table>


        </div>

        <div style="margin-top:20px;"></div>

        <div class="row">
            <div style="border:1px solid black;border-radius:10px; padding:10px;">
                <h4>Nota:</h4>
                <ul style="margin-left:30px;">
                    <li>Esta lista de verificación debe ser completada simultáneamente con la realización de la inspección del motovehículo.</li>
                    <li>Consulte el Manual de Preparación si el modelo no se recibe totalmente ensamblado.</li>
                    <li>Consulte la sección especificaciones del Manual de Taller para conocer las especificaciones propias del modelo.</li>
                </ul>
            </div>
        </div>

        <div style="margin-top:20px;"></div>


        <table class="table" style="margin-bottom:20px;margin-left:20px;width:33%;position:absolute;left:-10px;">
            <tr>
                <th colspan="2" style="background-color: red;color: white;text-align: center;">
                    MOTOR
                </th>
            </tr>
            <tr>
                <td style="width:95%;border:1px solid black">
                    Verificar nivel de aceite
                </td>
                <td style="border:1px solid black">

                </td>
            </tr>

            <tr>
                <td style="width:95%;border:1px solid black">
                    Verificar nivel de refrigerante
                </td>
                <td style="border:1px solid black">

                </td>
            </tr>


            <tr>
                <td style="width:95%;border:1px solid black">
                    Verificar operación motor de arranque y/o patada
                </td>
                <td style="border:1px solid black">

                </td>
            </tr>


        </table>

        <table class="table" style="margin-bottom:20px;margin-left:20px;width:33%;position:absolute;left:31%">
            <tr>
                <th colspan="2" style="background-color: red;color: white;color: white;text-align: center;">
                    SISTEMA ELECTRICO
                </th>
            </tr>
            <tr>
                <td style="width:95%;border:1px solid black">
                    Active y cargue la batería
                </td>
                <td style="border:1px solid black">

                </td>
            </tr>

            <tr>
                <td style="width:95%;border:1px solid black">
                    Verificar desempeño de carga del alternador
                </td>
                <td style="border:1px solid black">

                </td>
            </tr>


            <tr>
                <td style="width:95%;border:1px solid black">
                    Verificar operación interrup. parada del motor
                </td>
                <td style="border:1px solid black">

                </td>
            </tr>

            <tr>
                <td style="width:95%;border:1px solid black">
                    Verificar operación ópticas delant., tras., freno
                </td>
                <td style="border:1px solid black">

                </td>
            </tr>

            <tr>
                <td style="width:95%;border:1px solid black">
                    Verificar operación de giro y posición
                </td>
                <td style="border:1px solid black">

                </td>
            </tr>

            <tr>
                <td style="width:95%;border:1px solid black">
                    Verificar operación de interrumptores y bocina
                </td>
                <td style="border:1px solid black">

                </td>
            </tr>

            <tr>
                <td style="width:95%;border:1px solid black">
                    Verificar operación de indicadores de tablero
                </td>
                <td style="border:1px solid black">

                </td>
            </tr>


        </table>

        <table class="table" style="margin-bottom:20px;margin-left:20px;width:33%;position:absolute;right:5px;">
            <tr>
                <th colspan="2" style="background-color: red;color: white;color: white;text-align: center;">
                    OTROS
                </th>
            </tr>
            <tr>
                <td style="width:98%;border:1px solid black">
                    Operación de caballete central y lateral
                </td>
                <td style="border:1px solid black">

                </td>
            </tr>

            <tr>
                <td style="width:98%;border:1px solid black">
                    Traba de dirección
                </td>
                <td style="border:1px solid black">

                </td>
            </tr>


            <tr>
                <td style="width:98%;border:1px solid black">
                    Ajuste y posición de espejos
                </td>
                <td style="border:1px solid black">

                </td>
            </tr>

            <tr>
                <td style="width:98%;border:1px solid black">
                    Verifique existencia segunda llave
                </td>
                <td style="border:1px solid black">

                </td>
            </tr>

            <tr>
                <td style="width:98%;border:1px solid black">
                    Manual de usuario y herramientas
                </td>
                <td style="border:1px solid black">

                </td>
            </tr>

            <tr>
                <td style="width:98%;border:1px solid black">
                    Certificado de Garantía {!! $model->Items->first()->Models->Brands->name !!}
                </td>
                <td style="border:1px solid black">

                </td>
            </tr>

            <tr>
                <td style="width:98%;border:1px solid black">
                    Campaas de Seguridad pendientes
                </td>
                <td style="border:1px solid black">

                </td>
            </tr>


        </table>




        <table class="table" style="margin-bottom:20px;margin-left:20px;width:33%;position:absolute;left:-10px;top:500px;">
            <tr>
                <th colspan="2" style="background-color: red;color: white;color: white;text-align: center;">
                    SISTEMA COMBUSTIBLE
                </th>
            </tr>
            <tr>
                <td style="width:98% !important;border:1px solid black">
                    Cantidad suficiente de combustible
                </td>
                <td style="border:1px solid black">

                </td>
            </tr>

            <tr>
                <td style="width:98% !important;border:1px solid black">
                    operación canilla de combustible
                </td>
                <td style="border:1px solid black">

                </td>
            </tr>


            <tr>
                <td style="width:98% !important;border:1px solid black">
                    Ausencia de pérdidas
                </td>
                <td style="border:1px solid black">

                </td>
            </tr>

            <tr>
                <td style="width:98% !important;border:1px solid black">
                    Operación cebadoor manual o aut.
                </td>
                <td style="border:1px solid black">

                </td>
            </tr>

            <tr>
                <td style="width:98% !important;border:1px solid black">
                    Ajuste cables acelerador y/o cebador
                </td>
                <td style="border:1px solid black">

                </td>
            </tr>

        </table>


        <table class="table" style="margin-bottom:20px;margin-left:20px;width:33%;position:absolute;left:31%;top:710px;">
            <tr>
                <th colspan="2" style="background-color: red;color: white;color: white;text-align: center;">
                    SUSPENSIÓN
                </th>
            </tr>
            <tr>
                <td style="width:98% !important;border:1px solid black">
                    Verificar operación suspensión del. y tras.
                </td>
                <td style="border:1px solid black">

                </td>
            </tr>

        </table>


        <table class="table" style="margin-bottom:20px;margin-left:20px;width:33%;position:absolute;right:5px;top:620px;">
            <tr>
                <th colspan="2" style="background-color: red;color: white;color: white;text-align: center;">
                    PRUEBA DE MANEJO
                </th>
            </tr>
            <tr>
                <td style="width:98% !important;border:1px solid black">
                    Arranque fácil del motor
                </td>
                <td style="border:1px solid black">

                </td>
            </tr>
            <tr>
                <td style="width:98% !important;border:1px solid black">
                    Operación embrague y transmisión
                </td>
                <td style="border:1px solid black">

                </td>
            </tr>

            <tr>
                <td style="width:98% !important;border:1px solid black">
                    Buen desempeño deambos frenos
                </td>
                <td style="border:1px solid black">

                </td>
            </tr>

            <tr>
                <td style="width:98% !important;border:1px solid black">
                    Suavidad de la suspensión del. y tras.
                </td>
                <td style="border:1px solid black">

                </td>
            </tr>

            <tr>
                <td style="width:98% !important;border:1px solid black">
                    Verificar RPM de Ralenti, ver si es estable
                </td>
                <td style="border:1px solid black">

                </td>
            </tr>

            <tr>
                <td style="width:98% !important;border:1px solid black">
                    Operación del ventilador
                </td>
                <td style="border:1px solid black">

                </td>
            </tr>

            <tr>
                <td style="width:98% !important;border:1px solid black">
                    Facilidad de arranque en caliente
                </td>
                <td style="border:1px solid black">

                </td>
            </tr>

        </table>




        <table class="table" style="margin-bottom:20px;margin-left:20px;width:33%;position:absolute;left:-10px;top:740px;">
            <tr>
                <th colspan="2" style="background-color: red;color: white;color: white;text-align: center;">
                    FRENOS
                </th>
            </tr>
            <tr>
                <td style="width:98% !important;border:1px solid black">
                    Verificar operación de palanca y pedal
                </td>
                <td style="border:1px solid black">

                </td>
            </tr>
            <tr>
                <td style="width:98% !important;border:1px solid black">
                    Nivel de fluido de frenos
                </td>
                <td style="border:1px solid black">

                </td>
            </tr>

        </table>

        <table class="table" style="margin-bottom:20px;margin-left:20px;width:33%;position:absolute;left:31%;top:820px;">
            <tr>
                <th colspan="2" style="background-color: red;color: white;color: white;text-align: center;">
                    LAVADO FINAL
                </th>
            </tr>
            <tr>
                <td style="width:98% !important;border:1px solid black">
                    Efectúe el lavado de disco/s de freno
                </td>
                <td style="border:1px solid black">

                </td>
            </tr>
            <tr>
                <td style="width:98% !important;border:1px solid black">
                    Efectúe el lavado final
                </td>
                <td style="border:1px solid black">

                </td>
            </tr>
            <tr>
                <td style="width:98% !important;border:1px solid black">
                    Controle la apariencia en general
                </td>
                <td style="border:1px solid black">

                </td>
            </tr>

        </table>



        <div style="width:300px;border-top:1px solid black; margin-top:40px;position:absolute;top:1030px;right:20px;">
            <p style="text-align: center;">FIRMA</p>
        </div>
    </div>
</body>
</html>
