<!doctype html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport"
       content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>PDF</title>

 <link rel="stylesheet" href="vendors/LTE/bootstrap/css/bootstrap.css">

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

     .font21{
         font-size: 18px;
     }

     .col-xs-12{
         width: 100%;
         float: left;
         /*position: relative;*/
         min-height: 1px;
         padding-right: 15px;
         padding-left: 15px;
     }

     .col-xs-6{
         width: 50%;
         float: left;
         position: relative;
         min-height: 1px;
         padding-right: 15px;
         padding-left: 15px;
     }

     .col-xs-10{
         width: 66.66%;
         float: left;
         position: relative;
         min-height: 1px;
         padding-right: 15px;
         padding-left: 15px;
     }

     .col-xs-4{
         width: 25%;
         float: left;
         /*position: relative;*/
         min-height: 1px;
         padding-right: 15px;
         padding-left: 15px;
     }

     .col-xs-3{
         width: 33.33%;
         float: left;
         /*position: relative;*/
         min-height: 1px;
         padding-right: 15px;
         padding-left: 15px;
     }

     .col-xs-8{
         width: 75%;
         float: left;
         /*position: relative;*/
         min-height: 1px;
         padding-right: 15px;
         padding-left: 15px;
     }

     .col-xs-offset-1{
         margin-left: 8.33%;
     }

     .col-xs-offset-2{
         margin-left:  17%;
     }

     .text-center{
         text-align: center;
     }

     .row {
         margin-right: -15px;
         margin-left: -15px;
         float: none !important;
         clear:both;
     }


     /*Tablas*/
     .table {
         width: 100%;
         max-width: 100%;
         margin-bottom: 20px;
     }

     table {
         background-color: transparent;
     }

     table {
         border-spacing: 0;
         border-collapse: collapse;
         border: 1px solid #ddd;
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

     .center-vertical{
         margin-top: 50px;
         height:50px;

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

     .pull-right{
         float: right;
     }

     .text-danger{
         color: #a94442;
     }

     .border{
         border: 1px solid #ddd;
     }

     .footer{
         width: 110px;
         margin-top:-21px;
         padding:5px;
         float:right;
     }


     .text-center.top100{
         /*position:absolute;*/
         /*top: 110px;*/
         /*display: block;*/
         text-align: center;
         /*left: 80px;*/
         line-height: 150px;
     }

     .mt100{
         margin-top: 100px;
     }

     .logo{
         font-size: 25pt;
         line-height: 110px;

     }

     .inline>div{
         display: inline-block;
     }

     .lh100{
         margin-top: 40px;
     }

     .fs15{
         font-size: 15pt;
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

     /*.separador{*/
         /*float:none !important;*/
         /*clear: both  !important;*/
     /*}*/

     .hr{
         height: 5px;
         background:#3d3d3d;
     }

     .clearfix{
         clear: both !important;
         float: none !important;;
     }

     .separador{
         float:none !important;
         clear: both  !important;
     }

     .border{
         padding-top: 5px !important;
         padding-bottom: 5px !important;
     }

     .border-bottom{
         border-bottom: 1px solid rgb(190, 190, 190);

     }
 </style>

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="inline">

                <div class="col-xs-3 mb-20">
                    <div class="col-xs-12 text-center mb-40n">
                        <img src="images/branches/logo.png" alt="Logo" class="center-block" id="logo">
                    </div>

                    <div class="mt100 bold ml20 col-xs-12">
                        <p>{!! $model->Brancheables->first()->Branches->Company->nombre_fantasia !!}</p>
                        <p>{!! $model->Brancheables->first()->Branches->Company->razon_social !!}</p>
                        <p>{!! $model->Brancheables->first()->Branches->Company->direccion !!}</p>
                        <p>Tel: {!! $model->Brancheables->first()->Branches->Company->telefono !!}</p>
                    </div>
                </div>

                <div class="col-xs-4 text-center">
                    <h1 class="logo bold">{!!  $model->letra !!}</h1>
                </div>

                <div class="col-xs-4 lh100">
                    <p class="upper fs15 bold"><strong>{!! $model->tipo !!} {!! $model->letra !!}</strong></p>
                    <p class="fs15 bold">Nro: {!! $model->numero !!}</p>
                    <p>Fecha {!! $model->fecha !!}</p>
                    <div class="datosHeader">
                        <p>C.U.I.T: {!! $model->Brancheables->first()->Branches->Company->ciut !!}</p>
                        <p>ING. BRUTOS: {!! $model->Brancheables->first()->Branches->Company->ingresos_brutos !!} </p>
                        <p>INICIO ACTIVIDADES: {!! $model->Brancheables->first()->Branches->Company->inicio_actividades !!} </p>



                    </div>

                </div>
            </div>
        </div>


        <div class="row">
            <table class="table">
                <tr>
                    <td>adsdasdasd</td>
                    <td>adsdasdasd</td>
                    <td>adsdasdasd</td>
                </tr>
            </table>
        </div>

    </div>

    {{--
    <div class="separador border-bottom"></div>



      <div class="col-xs-12 separador border"></div>

     <div class="separador border">

         <div class="col-xs-6">
            <div class="contenedor-dato-cliente">
               <span class="upper"><b>CUIT: </b></span> <span class="upper text-muted">{!! $model->Sales->first()->Clients->dni !!}</span>
            </div>
         </div>

         <div class="col-xs-6">
            <div class="contenedor-dato-cliente">
               <span class="upper"><b>iva: </b></span> <span class="upper text-muted">Cons. Final</span>
            </div>
         </div>
    </div>

    <div class="col-xs-12 separador border"></div>
     <br>
    <div class="col-xs-12">
         <table class="table table-responsive">
             <tbody>
                 <tr>
                    <th>#</th>
                    <th>Cant.</th>
                    <th>Descripción</th>
                    <th>Precio Unitario</th>
                 </tr>
                 @foreach($model->Sales->first()->SalesItems as $salesItem)
                     @if($salesItem->Items->Models->types_id == 1)
                         <tr>
                             <td class="col-xs-1">{!! $salesItem->Items->id  !!}</td>
                             <td class="col-xs-1">1</td>
                             <td class="col-xs-5 descripcion">

                                  Marca : {!! $salesItem->Items->Models->Brands->name !!}  Modelo :{!! $salesItem->Items->Models->name !!}
                                  Color: {!! $salesItem->Items->Colors->name !!}
                             </td>
                             <td class="col-xs-1">
                                $ {!! number_format($model->importe_total,2) !!}
                             </td>
                         </tr>
                     @endif
                 @endforeach
             </tbody>

             <tfoot>
                 <tr>
                     <td></td>
                     <td class="text-right"><strong>Total:</strong></td>
                     <td><p> $ {!!number_format($model->importe_total ,2)!!}</p></td>
                     <td></td>
                 </tr>

                 <tr>
                     <td colspan="4">
                         <p class="leyendaTabla">La mercadería viaja por cuenta y orden del destinatario haciendose responsable civil y criminalmente a partir de la fecha por cualquier accidente, daño o perjuicio que pudiera ocasionar el rodado referido.</p>
                     </td>
                 </tr>

                 <tr>
                     <td colspan="4">
                          <p class="text-center">{!!  DNS1D::getBarcodeHTML($model->id, "EAN13") !!} </p>
                         <p class="text-center">{!!  $model->id !!} </p>

                     </td>
                 </tr>

             <tr>
                 <td>C.A.E. : {!! $model->cae !!}</td>
                 <td>vto : {!! $model->vencimiento_cae !!}</td>
             </tr>
             </tfoot>
         </table>
    </div>


    </div>
--}}
</body>
</html>
