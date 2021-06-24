<!doctype html>
<html lang="en">

<head>
 <title>PDF</title>

 <style>
     *{
         box-sizing: border-box;
         -moz-box-sizing: border-box;
         -webkit-box-sizing: border-box;
         font-size: 11px;
     }

     body {
         padding:0;
         -webkit-font-smoothing: antialiased;
         -moz-osx-font-smoothing: grayscale;
         font-weight: 400;
         overflow-x: hidden;
         overflow-y: auto;
         width: 100%;
         margin: auto;
         min-height: 100%;
         font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
         font-size: 14px;
         line-height: 1.42857143;
         color: #333;
         background-color: #fff;
     }



 </style>

</head>

<body>


   <table style="width:100%;border-spacing: 0;text-transform: uppercase;">
        <tr>
            <td style="width:33%;border-top:1px solid black;border-bottom:1px solid black;margin:0">
                <b style="text-transform: none;">N° de venta:</b> {!! $model->id !!}
            </td>
            <td style="width:33%;border-top:1px solid black;border-bottom:1px solid black;margin:0;text-align:center;">
                <h2>HOJA DE VENTA</h2>
            </td>
            <td style="width:33%;border-top:1px solid black;border-bottom:1px solid black;margin:0">
                <b style="text-transform: none;">Fecha pactada con el cliente:</b> {!! $model->date_confirm !!}
            </td>

        </tr>

        <tr>
            <td style="width:33%;border-top:1px solid black;border-bottom:1px solid black;margin:0">
                <b style="text-transform: none;">Fecha de entrega:</b> {!! $model->date_confirm !!}
            </td>
            <td style="width:33%;border-top:1px solid black;border-bottom:1px solid black;margin:0;text-align:center;">
                <b style="text-transform: none;">Vendedor:</b> {!!  $model->user->fullName !!}
            </td>
            <td style="width:33%;border-top:1px solid black;border-bottom:1px solid black;margin:0">
                <b style="text-transform: none;">Sucursal:</b> {!! $model->branchesConfirm->name !!}
            </td>

        </tr>

        <tr>
            <td colspan="2" style="width:50%;border-top:1px solid black;border-bottom:1px solid black;margin:0">
                <b style="text-transform: none;">Cliente:</b> {!! $model->clients->fullName !!}
            </td>
            <td style="width:50%;border-top:1px solid black;border-bottom:1px solid black;margin:0">
                <b style="text-transform: none;">Documento:</b> {!! $model->Clients->dni !!}
            </td>

        </tr>

        <tr>
            <td colspan="3" style="border-top:1px solid black;border-bottom:1px solid black;margin:0">
                <b style="text-transform: none;">Profesión:</b>
            </td>

        </tr>

        <tr>
            <td colspan="2" style="width:50%;border-top:1px solid black;border-bottom:1px solid black;margin:0">
                <b style="text-transform: none;">Teléfono Particular:</b> {!! $model->Clients->phone1 !!}
            </td>
            <td style="width:50%;border-top:1px solid black;border-bottom:1px solid black;margin:0">
                <b style="text-transform: none;">Teléfono Referencia:</b> {!! $model->Clients->phone2 !!}
            </td>

        </tr>

   </table>



   <table style="width:100%;border-spacing: 0;text-transform: uppercase;margin-top:20px;">
       <tr>
           <td style="border-top:1px solid black;border-bottom:1px solid black;margin:0; background-color:#d3d3d3;width: 4cm !important;border-left:1px solid black;border-right: 1px solid black;padding:5px;">
               <b style="text-transform: none;margin-left:5px;">Precio Unidad: $</b>{!! $model->SalesItems->first()->price_actual !!}
           </td>
           <td colspan="2" style="text-align:left;border-bottom:1px solid black;margin:0;padding:5px;">
               <b style="text-transform: none;margin-left:5px;">Impuesto interno: $</b> 0
           </td>

       </tr>

       <tr>
           <td style="border-bottom:1px solid black;margin:0;border-left:1px solid black;;padding:5px;">
               <b style="text-transform: none;margin-left:5px;">Unidad:</b> {!! $model->Items->first()->Models->name !!}
           </td>

           <td style="border-bottom:1px solid black;margin:0;padding:5px;">
               <b style="text-transform: none;margin-left:5px;">Color:</b> {!! $model->Items->first()->Colors->name !!}
           </td>

           <td style="border-bottom:1px solid black;margin:0;border-right:1px solid black;padding:5px;">
               <b style="text-transform: none;margin-left:5px;">R. Social:</b> {!! $model->Brancheables->first()->Branches->Company->razon_social !!}
           </td>

       </tr>

       <tr>
           <td style="border-bottom:1px solid black;margin:0;border-left:1px solid black;padding:5px;">
               <b style="text-transform: none;margin-left:5px;">N° motor:</b> {!! $model->Items->first()->n_motor !!}
           </td>

           <td style="border-bottom:1px solid black;margin:0;padding:5px;">
               <b style="text-transform: none;margin-left:5px;">N° cuadro:</b> {!! $model->Items->first()->n_cuadro !!}
           </td>

           <td style="border-bottom:1px solid black;margin:0;border-right:1px solid black;padding:5px;">
               <b style="text-transform: none;margin-left:5px;">N° certificado:</b>
           </td>

       </tr>
   </table>



   <table style="border-spacing: 0;text-transform: uppercase;margin-top:20px;">
       <tr>
           <td style="width:4cm !important;border-top:1px solid black;margin:0; background-color:#d3d3d3;border-left:1px solid black;border-right: 1px solid black;padding:5px;">
               <b style="text-transform: none;margin-left:5px;">Adicionales</b>
           </td>

           <td style="margin:0;" colspan="{!! $model->additionables->count() !!}">

           </td>

       </tr>

       <tr>
       @foreach($model->additionables as $additionable)
           <td style="border-top:1px solid black;margin:0;border-left:1px solid black;border-right:1px solid black;padding:5px;text-align:center;line-height: 7pt;">
               <b style="text-transform: none;margin-left:5px;font-size: 7pt;">{!! $additionable->additionals->name !!}</b>
           </td>

       @endforeach
       </tr>

       <tr>

       @foreach($model->additionables as $additionable)

           <td style="border-top:1px solid black;border-bottom:1px solid black;margin:0;border-left:1px solid black;border-right: 1px solid black;padding:5px;">

               $ {!! $additionable->amount!!}
           </td>

       @endforeach

       </tr>

   </table>


   {{--<table style="width:100%;border-spacing: 0;text-transform: uppercase;margin-top:20px;">--}}
       {{--<tr>--}}
           {{--<td style="border-top:1px solid black;border-bottom:1px solid black;margin:0; background-color:#d3d3d3;width: 4cm !important;border-left:1px solid black;border-right: 1px solid black;padding:5px;">--}}
               {{--<b style="text-transform: none;margin-left:5px;">Seguro</b>--}}
           {{--</td>--}}
           {{--<td colspan="3" style="border-bottom:1px solid black;margin:0;">--}}

           {{--</td>--}}

       {{--</tr>--}}

       {{--<tr>--}}
           {{--<td style="margin:0;border-left:1px solid black;;padding:5px;">--}}
               {{--<b style="text-transform: none;margin-left:5px;">Aseguradora:</b>--}}
           {{--</td>--}}

           {{--<td style="margin:0;padding:5px;">--}}
               {{--<b style="text-transform: none;margin-left:5px;">Tipo Seguro:</b>--}}
           {{--</td>--}}

           {{--<td style="margin:0;padding:5px;">--}}
               {{--<b style="text-transform: none;margin-left:5px;">Forma de Pago:</b>--}}
           {{--</td>--}}

           {{--<td style="margin:0;border-right:1px solid black;padding:5px;">--}}
               {{--<b style="text-transform: none;margin-left:5px;">Monto:</b>--}}
           {{--</td>--}}

       {{--</tr>--}}

       {{--<tr>--}}
           {{--<td colspan="1" style="border:1px solid black;border-top:0;border-right:0;margin:0;padding:5px;">--}}
               {{--<b style="text-transform: none;margin-left:5px;">Monto Total:</b>--}}
           {{--</td>--}}
           {{--<td colspan="3" style="border:1px solid black;border-top:0;border-left:0;margin:0;">--}}

           {{--</td>--}}
       {{--</tr>--}}
   {{--</table>--}}


   {{--<table style="width:100%;border-spacing: 0;text-transform: uppercase;margin-top:20px;border-bottom:1px solid black;">--}}
       {{--<tr>--}}
           {{--<td style="border-top:1px solid black;border-bottom:1px solid black;margin:0; background-color:#d3d3d3;width: 4cm !important;border-left:1px solid black;border-right: 1px solid black;padding:5px;">--}}
               {{--<b style="text-transform: none;margin-left:5px;">Patentamiento</b>--}}
           {{--</td>--}}
           {{--<td colspan="2" style="border-bottom:1px solid black;margin:0;">--}}

           {{--</td>--}}

       {{--</tr>--}}

       {{--<tr>--}}
           {{--<td style="margin:0;padding:5px;border-left:1px solid black;">--}}
               {{--<b style="text-transform: none;margin-left:5px;">Monto: $</b>--}}
           {{--</td>--}}

           {{--<td style="margin:0;padding:5px;">--}}
               {{--<b style="text-transform: none;margin-left:5px;">Alta de patente: $</b>--}}
           {{--</td>--}}

           {{--<td style="margin:0;padding:5px;border-right:1px solid black;">--}}
               {{--<b style="text-transform: none;margin-left:5px;">Larga distancia: $</b>--}}
           {{--</td>--}}


       {{--</tr>--}}

   {{--</table>--}}


   {{--<table style="width:100%;border-spacing: 0;text-transform: uppercase;margin-top:5px;border:1px solid black;">--}}
      {{--<tr>--}}
           {{--<td style="margin:0;padding:5px;">--}}
               {{--<b style="text-transform: none;margin-left:5px;">Casco: $</b>--}}
           {{--</td>--}}

           {{--<td style="margin:0;padding:5px;">--}}
               {{--<b style="text-transform: none;margin-left:5px;">Repuestos: $</b>--}}
           {{--</td>--}}

           {{--<td style="margin:0;padding:5px;">--}}
               {{--<b style="text-transform: none;margin-left:5px;">Linga: $</b>--}}
           {{--</td>--}}

           {{--<td style="margin:0;padding:5px;">--}}
               {{--<b style="text-transform: none;margin-left:5px;">Alarma: $</b>--}}
           {{--</td>--}}

           {{--<td style="margin:0;padding:5px;">--}}
               {{--<b style="text-transform: none;margin-left:5px;">Servicio técnico: $</b>--}}
           {{--</td>--}}

           {{--<td style="margin:0;padding:5px;">--}}
               {{--<b style="text-transform: none;margin-left:5px;">Seña: $</b>--}}
           {{--</td>--}}


       {{--</tr>--}}

      {{--<tr>--}}
           {{--<td style="margin:0;padding:5px;">--}}
               {{--<b style="text-transform: none;margin-left:5px;">Cédulas: $</b>--}}
           {{--</td>--}}

           {{--<td style="margin:0;padding:5px;">--}}
               {{--<b style="text-transform: none;margin-left:5px;">Tarjeta: $</b>--}}
           {{--</td>--}}

           {{--<td style="margin:0;padding:5px;">--}}
               {{--<b style="text-transform: none;margin-left:5px;">Alta seguro: $</b>--}}
           {{--</td>--}}

           {{--<td style="margin:0;padding:5px;">--}}
               {{--<b style="text-transform: none;margin-left:5px;">MotoAuxilio: $</b>--}}
           {{--</td>--}}

           {{--<td style="margin:0;padding:5px;">--}}
               {{--<b style="text-transform: none;margin-left:5px;">G. Extendida: $</b>--}}
           {{--</td>--}}

           {{--<td style="margin:0;padding:5px;">--}}
               {{--<b style="text-transform: none;margin-left:5px;">Pack Service: $</b>--}}
           {{--</td>--}}


       {{--</tr>--}}

   {{--</table>--}}


   <table style="width:4cm;border-spacing: 0;text-transform: uppercase;margin-top:20px;border-bottom:1px solid black;">
       <tr>
           <td style="border-top:1px solid black;border-bottom:1px solid black;margin:0; background-color:#d3d3d3;width: 4cm !important;border-left:1px solid black;border-right: 1px solid black;padding:5px;">
               <b style="text-transform: none;margin-left:5px;">Total: $</b> {!! $model->SalesItems->first()->price_actual + $model->Additionables->sum('amount') !!}
           </td>
       </tr>

   </table>



   <table style="width:100%;border-spacing: 0;text-transform: uppercase;margin-top:10px;border:1px solid black;">
       <tr>
           <td style="margin:0;padding:5px;border-right: 1px solid black;">
               <b style="text-transform: none;margin-left:5px;">Pago</b>
           </td>


           <td style="margin:0;padding:5px;border-right: 1px solid black;">
               <b style="text-transform: none;margin-left:5px;">Tarjeta</b>
           </td>

           <td style="margin:0;padding:5px;border-right: 1px solid black;">
               <b style="text-transform: none;margin-left:5px;">Monto</b>
           </td>

           <td style="margin:0;padding:5px;border-right: 1px solid black;">
               <b style="text-transform: none;margin-left:5px;">Plazo</b>
           </td>

           <td style="margin:0;padding:5px;border-right: 1px solid black;">
               <b style="text-transform: none;margin-left:5px;">Total Cupon</b>
           </td>

           <td style="margin:0;padding:5px;border-right: 1px solid black;">
               <b style="text-transform: none;margin-left:5px;">Banco</b>
           </td>

           <td style="margin:0;padding:5px;border-right: 1px solid black;">
               <b style="text-transform: none;margin-left:5px;">Número</b>
           </td>

           <td style="margin:0;padding:5px;">
               <b style="text-transform: none;margin-left:5px;">Vencimiento</b>
           </td>

       </tr>

       @forelse($model->Payments as $payment)
           <tr style="font-size:6pt !important;">
               <td style="margin:0;padding:5px;border-top: 1px solid black;border-right: 1px solid black;">
                   {!! $payment->PayMethods->name !!}
               </td>

               <td style="margin:0;padding:5px;border-top: 1px solid black;border-right: 1px solid black;">

               </td>

               <td style="margin:0;padding:5px;border-top: 1px solid black;border-right: 1px solid black;">
                   $ {!! $payment->amount !!}
               </td>

               <td style="margin:0;padding:5px;border-top: 1px solid black;border-right: 1px solid black;">
                   {!! $payment->term !!}
               </td>

               <td style="margin:0;padding:5px;border-top: 1px solid black;border-right: 1px solid black;">

               </td>

               <td style="margin:0;padding:5px;border-top: 1px solid black;border-right: 1px solid black;">
                   {!! $payment->banks->name or '' !!}
               </td>

               <td style="margin:0;padding:5px;border-top: 1px solid black;border-right: 1px solid black;">
                   {!! $payment->number or '' !!}
               </td>

               <td style="margin:0;padding:5px;border-top: 1px solid black;">

               </td>

           </tr>
        @empty
           <tr>
               <td colspan="8"></td>
           </tr>
        @endforelse

   </table>

   <table style="width:5cm !important;border-spacing: 0;text-transform: uppercase;margin-top:0;border:1px solid black;border-top:none;">
        <tr>
            <td style="border-top:1px solid black;border-bottom:1px solid black;margin:0; background-color:#d3d3d3;width: 4cm !important;border-left:1px solid black;border-right: 1px solid black;padding:5px;">
                <b style="text-transform: none;margin-left:5px;">Total pagado: $</b> {!! $model->Payments->sum('amount') !!}
            </td>
        </tr>
    </table>



   <table style="width:100%;border-spacing: 0;text-transform: uppercase;margin-top:20px;">
       <tr>
           <td style="border-top:1px solid black;border-bottom:1px solid black;margin:0; background-color:#d3d3d3;width: 4cm !important;border-left:1px solid black;border-right: 1px solid black;padding:5px;">
               <b style="text-transform: none;margin-left:5px;">Observaciones</b>
           </td>
           <td></td>


       </tr>

       <tr>
           <td colspan="2" style="margin:0;padding:5px;border:1px solid black;">

           </td>

       </tr>

   </table>
</body>
</html>
