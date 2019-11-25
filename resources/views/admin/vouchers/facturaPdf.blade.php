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




 </style>

</head>

<body>

        <div class="row">
            <table class="bloque1 no-border">
                <tr>
                    <td class="col-xs-4">
                        {{--<img src="images/branches/logo.png" alt="Logo" class="center-block" id="logo">--}}
                     <span class="fs20 bold ">{!! $model->Brancheables->first()->Branches->Company->nombre_fantasia !!}</span>

                    </td>
                    <td class="col-xs-4 text-center">
                        <h1 class="logo bold">{!!  $model->letra !!}</h1>
                    </td>
                    <td class="col-xs-4">
                        <p class="upper fs15 bold"><strong>{!! $model->tipo !!} {!! $model->letra !!}</strong></p>
                        <p class="fs15 bold">Nro: {!! $model->numero !!}</p>
                        <p>Fecha {!! $model->fecha !!}</p>

                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="ml20">Razón Social : <strong>{!! $model->Brancheables->first()->Branches->Company->razon_social !!}</strong></p>
                        <p class="ml20">Domicilio Comercial : <strong>{!! $model->Brancheables->first()->Branches->Company->direccion !!}</strong></p>
                        <p class="ml20">Condición IVA: <strong>{!! $model->Brancheables->first()->Branches->Company->IvaConditions->name !!}</strong></p>
                    </td>
                    <td>

                    </td>
                    <td>
                        <div class="datosHeader">
                            <p>C.U.I.T: <strong>{!! $model->Brancheables->first()->Branches->Company->cuit !!}</strong></p>
                            <p>ING. BRUTOS: <strong>{!! $model->Brancheables->first()->Branches->Company->ingresos_brutos !!} </strong> </p>
                            <p>INICIO ACTIVIDADES: <strong> {!! $model->Brancheables->first()->Branches->Company->inicio_actividades !!} </strong> </p>
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
                    <p><span >Apellido y Nombre / Razón Social : </span> <strong >{!! $model->Sales->first()->Clients->fullName !!}</strong></p>
                </td>


                <td class="col-xs-6">
                    <p><span >Condición IVA: </span> <strong >{!! $model->Sales->first()->Clients->ivaConditions->name !!}</strong></p>
                </td>

            </tr>

            <tr>
                <td class="col-xs-6">
                    <p><span>DNI / CUIT / CUIL: </span> <strong >{!! $model->Sales->first()->Clients->dni !!}</strong></p>

                </td>

                <td class="col-xs-6">
                    <p><span>Dirección: </span> <strong >{!! $model->Sales->first()->Clients->address !!}, {!! $model->Sales->first()->Clients->Localidad !!}</strong></p>
                </td>

            </tr>

        </table>

        </div>



        <div class="row">
            @if($model->letra == "B")
                <table class="bloque1 table table-striped">
                    <thead  >
                        <tr bgcolor="#d3d3d3">
                            <th class="col-xs-1">#</th>
                            <th class="col-xs-1">Cant.</th>
                            <th class="col-xs-8">Descripción</th>
                            <th class="col-xs-2">Precio Unitario</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($model->Sales->first()->SalesItems as $salesItem)
                            @if($salesItem->Items->Models->types_id == 1)
                                <tr>
                                    <td class="col-xs-1">{!! $salesItem->Items->id  !!}</td>
                                    <td class="col-xs-1">1</td>
                                    <td class="col-xs-8">
                                       <span> Marca : </span><strong>{!! $salesItem->Items->Models->Brands->name !!} </strong>
                                       <span> Modelo : </span><strong>{!! $salesItem->Items->Models->name !!}</strong>
                                       {{--<span> Color : </span><strong>{!! $salesItem->Items->Colors->name !!}</strong><br>--}}
                                       {{--<span> N Motor : </span><strong>{!! $salesItem->Items->n_motor or '' !!}</strong><br>--}}
                                       {{--<span> N Cuadro : </span><strong>{!! $salesItem->Items->n_cuadro or ''!!}</strong><br>--}}
                                       {{--<span> Año : </span><strong>{!! $salesItem->Items->Certificates->year or '' !!}</strong>--}}
                                    </td>
                                    <td class="col-xs-2">
                                        $ {!! number_format($model->importe_total,2) !!}
                                    </td>
                                </tr>
                            @endif
                        @endforeach

                    </tbody>
                </table>

            @elseif($model->letra == "A")
                <table class="bloque1 table table-striped">
                    <thead  >
                    <tr bgcolor="#d3d3d3">
                        <th class="col-xs-1">#</th>
                        <th class="col-xs-1">Cant.</th>
                        <th class="col-xs-6">Producto/Servicio</th>
                        <th class="col-xs-1">Precio Unit.</th>
                        <th class="col-xs-1">Subtotal</th>
                        <th class="col-xs-1">Alicuota IVA</th>
                        <th class="col-xs-1">Subtotal c/IVA</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($model->Sales->first()->SalesItems as $salesItem)
                        @if($salesItem->Items->Models->types_id == 1)
                            <tr>
                                <td class="col-xs-1">{!! $salesItem->Items->id  !!}</td>
                                <td class="col-xs-1">1</td>
                                <td class="col-xs-3">
                                    <span> Marca : </span><strong>{!! $salesItem->Items->Models->Brands->name !!} </strong>
                                    <span> Modelo : </span><strong>{!! $salesItem->Items->Models->name !!}</strong>
                                    {{--<span> Color : </span><strong>{!! $salesItem->Items->Colors->name !!}</strong><br>--}}
                                    {{--<span> N Motor : </span><strong>{!! $salesItem->Items->n_motor or '' !!}</strong><br>--}}
                                    {{--<span> N Cuadro : </span><strong>{!! $salesItem->Items->n_cuadro or ''!!}</strong><br>--}}
                                    {{--<span> Año : </span><strong>{!! $salesItem->Items->Certificates->year or '' !!}</strong>--}}
                                </td>
                                <td class="col-xs-2">$ {!! number_format($model->importe_total,2) !!}</td>
                                <td class="col-xs-2">$ {!! number_format($model->importe_total,2) !!}</td>
                                <td class="col-xs-1">21%</td>
                                <td class="col-xs-2">$ {!! number_format(($model->importe_total * 1.21),2) !!}</td>
                            </tr>
                        @endif
                    @endforeach

                    </tbody>
                </table>
            @else


            @endif

        </div>


        <div class="cierre">
            @if($model->letra == 'B')
                <table class="bloque1 table table-striped no-border">
                    <tr>
                        <td></td>
                        <td class="text-right"><strong>SubTotal:</strong></td>
                        <td><p> $ {!!number_format($model->importe_total ,2)!!}</p></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="text-right"><strong>Importe Otros Tributos:</strong></td>
                        <td><p> $ {!!number_format(0 ,2)!!}</p></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="text-right"><strong>Importe Total:</strong></td>
                        <td><strong> $ {!!number_format($model->importe_total ,2)!!}</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="col-xs-6 text-center">
                            <p class="text-center">{!!  DNS1D::getBarcodeHTML($model->id, "EAN13") !!}</p>
                        </td>
                        <td class="col-xs-3">CAE N.: {!! $model->cae !!}</td>
                        <td class="col-xs-3">CAE Vto. : {!! $model->vencimiento_cae !!}</td>
                    </tr>
                </table>
            @elseif($model->letra == "A")
                <table class="bloque1 table table-striped no-border">
                    <tr>
                        <td></td>
                        <td class="text-right"><strong>Importe Neto Gravado:</strong></td>
                        <td><p> $ {!!number_format($model->importe_total ,2)!!}</p></td>
                        <td></td>
                    </tr>

                    <tr>
                        <td></td>
                        <td class="text-right"><strong>IVA 21%:</strong></td>
                        <td><p> $ {!!number_format(($model->importe_total * 1.21)-$model->importe_total ,2)!!}</p></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="text-right"><strong>IVA 10.5%:</strong></td>
                        <td><p> $ {!!number_format(0 ,2)!!}</p></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="text-right"><strong>Importe Otros Tributos:</strong></td>
                        <td><strong> $ {!!number_format(0 ,2)!!}</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td class="text-right"><strong>Importe Total:</strong></td>
                        <td><strong> $ {!!number_format($model->importe_total ,2)!!}</strong></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="col-xs-6 text-center">
                            <p class="text-center">{!!  DNS1D::getBarcodeHTML($model->id, "EAN13") !!}</p>
                        </td>
                        <td class="col-xs-3">CAE N.: {!! $model->cae !!}</td>
                        <td class="col-xs-3">CAE Vto. : {!! $model->vencimiento_cae !!}</td>
                    </tr>
                </table>
            @endif
        </div>

</body>
</html>
