<html>
<body>

<div style="padding: 5px">
	{!!  DNS2D::getBarcodeHTML($it->id, "QRCODE") !!}
</div>	
<div>
	<h3>{{$it->n_serie}}</h3>
	<h3>{{$it->f_vencimiento}}</h3>
	
</div>
</body>
</html>
