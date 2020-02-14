<html>
<body>

<div style="padding: 5px">
	{!!  DNS2D::getBarcodeHTML($it->id, "QRCODE") !!}
</div>	
<div>
	<small> Modelo :</small> <strong>{{$it->Models->name}}</strong><br>
	<small>NSerie / IDent. :</small> <strong>{ {{$it->n_serie}}</strong><br>
	<small>Vto. :</small> <strong>{{$it->f_vencimiento}}</strong><br>
</div>
</body>
</html>
