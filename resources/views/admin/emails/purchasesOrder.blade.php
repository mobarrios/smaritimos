<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pedido de mercadería</title>

    <style>
        *,body{margin:0}.col-xs-12,.img-responsive{width:100%}*{padding:0;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;font-size:11px}body{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;font-weight:400;overflow-x:hidden;overflow-y:auto;font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;font-size:14px;line-height:1.42857143;color:#333;background-color:#fff}body,html{min-height:100%}.col-xs-10,.col-xs-12,.col-xs-3,.col-xs-4,.col-xs-6,.col-xs-8{float:left;position:relative;min-height:1px;padding-right:15px;padding-left:15px}html{font-size:10px;-webkit-tap-highlight-color:transparent}.font21{font-size:18px}.col-xs-6{width:50%}.col-xs-10{width:66.66%}.col-xs-4{width:25%}.col-xs-3{width:33.33%}.col-xs-8{width:75%}.footer,.pull-right{float:right}.col-xs-offset-1{margin-left:8.33%}.col-xs-offset-2{margin-left:17%}.text-center{text-align:center}.row{margin-right:-15px;margin-left:-15px}.table{width:100%;max-width:100%;margin-bottom:20px}table{background-color:transparent;border-spacing:0;border-collapse:collapse;border:1px solid #ddd}.table>thead:first-child>tr:first-child>th{border-top:0}.table>thead>tr>th{border-bottom:2px solid #ddd}.table>tbody>tr>td,.table>tbody>tr>th,.table>tfoot>tr>td,.table>tfoot>tr>th,.table>thead>tr>td,.table>thead>tr>th{padding:8px;line-height:1.42857143;vertical-align:top;border-top:1px solid #ddd}th{text-align:left}td,th{padding:0}.table-striped>thead>tr:nth-child(2){background-color:#f9f9f9}.colorWhite{color:#fff}.bg-blue{background-color:#3498db}.blue{color:#3498db}#logo{width:150px}.center-vertical{margin-top:50px;height:50px}.center-block{margin:auto}.mb-40n{margin-bottom:-40px}.mb-20{margin-bottom:20px}.text-danger{color:#a94442}.border{border:1px solid #ddd}.footer{width:110px;margin-top:-21px;padding:5px}

    </style>

</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 mb-20">
                <div class="col-xs-12 text-center mb-40n">
                    <img src="http://motonet.com.ar/assets/web/img/logo.png" alt="Logo" class="center-block" id="logo">
                </div>

                <h4 class="font21 text-center">Pedido de Mercadería</h4>
                <p class="text-center">{!! date('d-m-Y',strtotime($repo->created_at)) !!}</p>

            </div>
        </div>

        <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
                <table class="table table-striped table-hover">

                    <thead>
                        <tr class="bg-blue colorWhite">
                            <td colspan="9" class="text-center">Motonet - Sucursal: <b>{!! $user->Brancheables->where('id',$user->branches_active_id)->first()->branches->name !!}</b></td>
                        </tr>
                        <tr>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Cantidad</th>
                            <th>$ Lista</th>
                            <th>% Dto.</th>
                            <th>Color</th>
                            <th>S.Total Neto</th>
                            <th>Total Dto.</th>
                            <th>S.Total</th>
                        </tr>
                    </thead>
                    <?php $t = 0;?>
                    @foreach($repo->PurchasesOrdersItems as $item)
                        <tr>
                            <td>{{$item->Models->Brands->name}}</td>
                            <td>{{$item->Models->name}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>$ {{number_format($item->price,2)}}</td>
                            <td>% {{$item->discount}}</td>
                            <td>{{$item->colors->name}}</td>
                            <td>$ {{number_format($item->quantity * $item->price, 2)  }}</td>
                            <td>
                                $ {{number_format(((($item->quantity * $item->price) * $item->discount)/100),2 )}}</td>
                            <td class="text-danger">
                                $ {{number_format(($item->quantity * $item->price)  - ((($item->quantity * $item->price) * $item->discount)/100),2) }}</td>
                            <?php $t += ($item->quantity * $item->price) - ((($item->quantity * $item->price) * $item->discount) / 100);?>
                        </tr>
                    @endforeach
                </table>
                    <div class="col-xs-12 border footer">
                        <span class="pull-right">Total : <strong class="text-danger">$ {{number_format($t,2)}}</strong></span>
                    </div>

            </div>
        </div>
    </div>
    
</body>
</html>