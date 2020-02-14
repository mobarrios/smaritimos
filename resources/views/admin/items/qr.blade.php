<html>
<body>

<div style="padding: 5px">
	{!!  DNS2D::getBarcodeHTML($it->id, "QRCODE") !!}
</div>	
<div>
	Modelo : <h5>{{$it->Models->name}}</h5>
	NSerie / IDent. : <h6>{{$it->n_serie}}</h6>
	Vto. :<h6>{{$it->f_vencimiento}}</h6>
</div>
</body>
</html>
