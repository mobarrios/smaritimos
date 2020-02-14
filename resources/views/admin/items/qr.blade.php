<html>
<body>

<div style="padding: 5px">
	{!!  DNS2D::getBarcodeHTML($it->id, "QRCODE") !!}
</div>	
<div>
	Modelo : {{$it->Models->name}}<br>
	NSerie / IDent. : {{$it->n_serie}}<br>
	Vto. :{{$it->f_vencimiento}}<br>
</div>
</body>
</html>
