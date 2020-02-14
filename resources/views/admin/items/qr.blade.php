<html>
<body>

<div style="padding: 5px">
	{!!  DNS2D::getBarcodeHTML($it->id, "QRCODE") !!}
</div>	
<div>
	Modelo : <h1>{{$it->Models->name}}</h1>
	NSerie / IDent. : <h3>{{$it->n_serie}}</h3>
	Vto. :<h3>{{$it->f_vencimiento}}</h3>
	
</div>
</body>
</html>
