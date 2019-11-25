<!doctype html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport"
       content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>PDF</title>


 
 <style>
     *{
         padding:0;
         margin: 0;
         box-sizing: border-box;
         -moz-box-sizing: border-box;
         -webkit-box-sizing: border-box;
         font-size: 10px;
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
         border: none !important;
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

    #barcode{
        position:absolute;
        top:100px;
        left:300px;
    }

    .datosHeader{
        font-size: 8px !important;
    }


 </style>

</head>

<body class="padding-0 margin-0">
    <div id="barcode">
        <p class="text-center">{!!  DNS1D::getBarcodeHTML(1, "EAN13") !!}</p>
    </div>

    <div class="row">
            <table class="bloque1 no-border">
                <tr>
                    <td class="col-xs-4">
                     <span class="fs20 bold ">{!! $model->Brancheables->first()->Branches->Company->nombre_fantasia !!}</span>

                    </td>
                    <td class="col-xs-4 text-center">
                        <h1 class="logo text-right">X</h1>
                    </td>
                    <td class="col-xs-4">
                        <p class="upper fs15 bold"><strong>{!! $model->tipo !!} {!! $model->letra !!}</strong></p>
                        <p class="fs15 bold">Nro: {!! $model->numero !!}</p>
                        <p>Fecha {!! $model->fecha !!}</p>

                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="ml20">{!! $model->Brancheables->first()->Branches->Company->razon_social !!}</p>
                        <p class="ml20">{!! $model->Brancheables->first()->Branches->Company->direccion !!}</p>
                        <p class="ml20">Tel: {!! $model->Brancheables->first()->Branches->Company->telefono !!}</p>
                    </td>
                    <td>

                    </td>
                    <td>
                        <div class="datosHeader">
                            <p class="upper">Recibo provisorio</p>
                            <p class="datosHeader">No válido como factura</p>
                            <p>N: {!! $model->numero !!}</p>
                            <p>Fecha {!! $model->fecha !!}</p>
                            <br>
                            <p>C.U.I.T: 33-70964580-9</p>
                            <p>ING. BRUTOS: 33-70964580-9</p>
                            <p>INICIO ACTIVIDADES: 01-06-06</p>
                        </div>
                    </td>
                </tr>
            </table>
        </div>


    <div class="separador"></div>

    <div class="row">

        <table class="bloque1 no-border ml20 mb-20">
            <tr>
                <td class="col-xs-6">
                    <p><span class="upper"><b>Nombre: </b></span> <span class="upper">{!! $client->fullname !!}</span></p>
                </td>


                <td class="col-xs-6">
                    <p><span class="upper"><b>Domicilio: </b></span> <span class="upper">{!! $client->address !!}</span></p>
                </td>

                <td class="col-xs-6">
                    <p><span class="upper"><b>Localidad: </b></span> <span class="upper">{!! $client->city !!}</span></p>

                </td>
                
                <td class="col-xs-6">
                    <p><span class="upper"><b>Teléfono: </b></span> <span class="upper">{!! $client->phone !!}</span></p>
                </td>
            </tr>

            <tr>
                <td class="col-xs-6">
                    <p><span class="upper"><b>CUIT: </b></span> <span class="upper">{!! $client->dni !!}</span></p>
                </td>
            
                <td class="col-xs-6">
                    <p><span class="upper"><b>IVA: </b></span> <span class="upper">{!! $client->ivaConditions->name !!}</span></p>
                </td>

            </tr>

        </table>

    </div>



    <div class="col-xs-12 separador"></div>
    <div class="row">

        <div class="col-xs-12">
             <table class="table table-responsive">
                 <tbody>
                     <tr>
                        <th>Fecha</th>
                        <th>Medio</th>
                        <th>Monto</th>
                        <th>Descripción</th>
                     </tr>
                     @foreach($model->Payments as $payments)
                         <tr>
                             <td>{!! $payments->date !!}</td>
                             <td>{!! $payments->PayMethods->name !!}</td>
                             <td>{!! $payments->amount !!}</td>
                             <td class="descripcion">
                                 {!! $payments->banks ? '<p>Banco: '.$payments->banks->name.'</p>' : '' !!}
                                 {!! $payments->check_date ? 'Fecha cheque: '.$payments->check_date.'</p>' : '' !!}
                                 {!! $payments->check_pay_date ? 'Fecha de cobro: '.$payments->check_pay_date.'</p>' : '' !!}
                                 {!! $payments->transf_date ? 'Fecha de transferencia: '.$payments->transf_date.'</p>' : '' !!}
                                 {!! $payments->term ? 'Plazo: '.$payments->term.'</p>' : '' !!}
                                 {!! $payments->Financials ? 'Financiera: '.$payments->Financials->name.'</p>' : '' !!}

                             </td>
                         </tr>
                     @endforeach
                 </tbody>

                 <tfoot>
                     <tr>
                         <td colspan="4"><p class="text-center upper">Recibí conforme la suma total de <strong>${!! $model->importe_total !!}</strong></p></td>
                     </tr>

                     <tr>
                         <td colspan="4">
                             <p class="leyendaTabla">La mercadería viaja por cuenta y orden del destinatario haciendose responsable civil y criminalmente a partir de la fecha por cualquier accidente, daño o perjuicio que pudiera ocasionar el rodado referido.</p>
                         </td>
                     </tr>

                 </tfoot>
             </table>
        </div>

    </div>



</body>
</html>
