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
      font-size: 60%;
       line-height: 61%;
   }

  .margin-0{
     margin: 0 !important;
  }


  body{
     margin: 0 !important;
     padding: 5px !important;

     border-radius: 0px;
     border: 1px solid rgb(0,0,0);
     clear: both;

  }

  .upper{
      text-transform: uppercase;
  }

  .logo{
     font-size: 30px;
     font-weight: bold;
     border: 1px solid rgb(0,0,0);
     display: inline-block;
     text-align: center;
     width:30px;
     border-radius: 5px;
     padding: 5px;
     margin:auto;
      line-height:30px;
  }

   .contenedor-dato-cliente{
       font-size: 10px !important;
       line-height: 13px !important;
       padding-botom: 5px !important;
   }

  .datosHeader{
     line-height: 2px !important;
     font-size: 50% !important;

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


  .datos-cliente .border{
     font-size: 12px !important;
  }

  .leyendaTabla{
     font-size: 55%;
     line-height: 59%;
     text-align: center;
  }

     .separador.border span{
         line-height: 10px !important;
     }


 </style>

</head>

<body class="padding-0 margin-0">

    <div>
         <div class="col-xs-3 text-center">
             <div>
                 <img src="images/branches/logo.png" alt="Logo" class="img-responsive">
                     <p>{!! $model->Brancheables->first()->Branches->Company->nombre_fantasia !!}</p>
             </div>
         </div>

         <div class="col-xs-4 text-center">
             <h1 class="logo">{!!  $model->letra !!}</h1>
         </div>

         <div class="col-xs-4 text-center">
             <p class="upper"><strong>{!! $model->tipo !!} {!! $model->letra !!}</strong></p>
             <p>Nro: {!! $model->numero !!}</p>
             <p>Fecha {!! $model->fecha !!}</p>
             <br>
             <div class="datosHeader">
                <p>C.U.I.T: {!! $model->Brancheables->first()->Branches->Company->ciut !!}</p>
                <p>ING. BRUTOS: {!! $model->Brancheables->first()->Branches->Company->ingresos_brutos !!} </p>
                <p>INICIO ACTIVIDADES: {!! $model->Brancheables->first()->Branches->Company->inicio_actividades !!} </p>

                     <p>{!! $model->Brancheables->first()->Branches->Company->razon_social !!}</p>
                     <p>{!! $model->Brancheables->first()->Branches->Company->direccion !!}</p>
                     <p>{!! $model->Brancheables->first()->Branches->Company->telefono !!}</p>

             </div>
         </div>


    </div>

    <div class="separador border-bottom"></div>

    <div class="datos-cliente">

      <div class="col-xs-12 border">
          <div class="contenedor-dato-cliente">
             <span class="upper"><b>Nombre: </b></span> <span class="upper text-muted">{!! $model->Sales->first()->Clients->fullname !!}</span>
          </div>
      </div>

      <div class="separador"></div>

      <div class="col-xs-12 border">
          <div class="contenedor-dato-cliente">
             <span class="upper"><b>Domicilio: </b></span> <span class="upper text-muted">{!! $model->Sales->first()->Clients->address !!}</span>
          </div>
      </div>

      <div class="separador border">

         <div class="col-xs-6">
              <div class="contenedor-dato-cliente">
                 <span class="upper"><b>Localidad: </b></span> <span class="upper text-muted">{!! $model->Sales->first()->Clients->city !!}</span>
              </div>
          </div>

          <div class="col-xs-6">
              <div class="contenedor-dato-cliente">
                 <span class="upper"><b>Teléfono: </b></span> <span class="upper text-muted">{!! $model->Sales->first()->Clients->phone !!}</span>
              </div>
          </div>
      </div>

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

</body>
</html>
