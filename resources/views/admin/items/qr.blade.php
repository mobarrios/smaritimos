<html>
<body>

<div style="padding: 5px">
	{!!  DNS2D::getBarcodeHTML($it->id, "QRCODE") !!}
</div>	
<div>
	Modelo : <h3>{{$it->Models->name}}</h3>
	NSerie / IDent. : <h4>{{$it->n_serie}}</h4>
	Vto. :<h4>{{$it->f_vencimiento}}</h4>
	
</div>
</body>
</html>
