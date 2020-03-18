<!DOCTYPE html>
<!--[if IEMobile 7 ]> <html lang="es"class="iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html lang="es" class="ie6 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7 ]>    <html lang="es" class="ie7 lt-ie8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="es" class="ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html lang="es"><!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tarjeta AlimentAR</title>
	<meta name="description" content="Base de html y css para la creación de sitios pertenecientes a la Administración Pública Nacional de la República Argentina.">
	<meta name="author" content="Presidencia de la Nación">
	<link rel="shortcut icon" href="img/favicon.ico">

	<!-- Nav and address bar color -->
	<meta name="theme-color" content="#0072b8">
	<meta name="msapplication-navbutton-color" content="#0072b8">
	<meta name="apple-mobile-web-app-status-bar-style" content="#0072b8">

	<meta property="og:url" content="http://localhost:4000/proyectos/argentina/" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="Banco de Pruebas" />
	<meta property="og:description" content="Base de html y css para la creación de sitios pertenecientes a la Administración Pública Nacional de la República Argentina." />
	<meta property="og:image" content="/ejemplos/img/jumbotron.jpg" />
	<meta property="og:locale" content="es_AR" />

	<meta name="twitter:card" content="summary" />
	<meta name="twitter:title" content="Banco de Pruebas" />
	<meta name="twitter:description" content="Base de html y css para la creación de sitios pertenecientes a la Administración Pública Nacional de la República Argentina." />
	<meta name="twitter:image" content="/ejemplos/img/jumbotron.jpg" />

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	

	@if (env('APP_ENV') == 'local')
		<link rel="stylesheet" href="{{asset('miargentina/css/poncho.min.css')}}">
		<link rel="stylesheet" href="{{asset('miargentina/css/icono-arg.css')}}">
	@else
		<link rel="stylesheet" href="{{secure_asset('miargentina/css/poncho.min.css')}}">
		<link rel="stylesheet" href="{{secure_asset('miargentina/css/icono-arg.css')}}">
	@endif




	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
      <script src="http://argob.github.io/poncho/js/html5shiv.js"></script>
      <script src="http://argob.github.io/poncho/js/respond.min.js"></script>
  <![endif]-->
  

</head>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-116404797-8"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-116404797-8');
</script>
<script src='https://www.google.com/recaptcha/api.js?render=6LdXC9EUAAAAABm_ftXh4M0_JSRsv2QdDNTEar_g'></script>
<script>
grecaptcha.ready(function() {
grecaptcha.execute('6LdXC9EUAAAAABm_ftXh4M0_JSRsv2QdDNTEar_g', {action: "buscar" })
.then(function(token) {
var recaptchaResponse = document.getElementById('recaptchaResponse');
recaptchaResponse.value = token;
});});
</script>

<body>


	<header>
		<nav class="navbar navbar-top navbar-default" role="navigation">
			<div class="container">
				<div>
					<div class="navbar-header">
						<a class="navbar-brand" href="#" aria-label="Argentina.gob.ar Presidencia de la Nación">
							<img alt="Argentina.gob.ar" 
							
							@if (env('APP_ENV') == 'local')
								src="{{asset('miargentina/img/argentinagob.svg')}}" 
							@else
								src="{{secure_asset('miargentina/img/argentinagob.svg')}}" 
							@endif

							height="50">
						</a>
						<a href="https://mi.argentina.gob.ar/" class="btn btn-login btn-link visible-xs" aria-label="Ingresar a Mi Argentina"><em class="icono-arg-mi-argentina"></em></a>
					</div>
					<a href="https://mi.argentina.gob.ar/" class="btn btn-login btn-link hidden-xs" aria-label="Ingresar a Mi Argentina"><i class="icono-arg-mi-argentina"></i>Mi Argentina</a>
				</div>
			</div>
		</nav>
		<section class="jumbotron" style="background-image: url('miargentina/img/modernizacion.jpg');">
			<div class="jumbotron_bar">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<ol class="breadcrumb pull-left">
								<li><a href="">Argentina</a></li>
								<li class="active"><span>Ministerio de Desarrollo Social</span></li>
								<li class="active"><span>Dónde retiro mi Tarjeta AlimentAR</span></li>
							</ol>
						</div>
					</div>
				</div>
			</div>
			<div class="jumbotron_body">
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-md-8 col-md-offset-2 text-center">
							<h1>Dónde retiro mi Tarjeta AlimentAR</h1>
							<p>Consultá el padrón para saber el lugar y horario donde retirar tu tarjeta.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="overlay"></div>
		</section>
	</header>
	<main role="main"> 
		<section>
			<div class="container">
				<div class="row m-b-2">
					<div class="col-md-6 col-md-offset-3">
						<div class="form-group item-form">
						
							@if(isset($datas))
								@if($datas == 'sin data')

								<fieldset>
									
									<section class="bg-white p-x-3">

										<div class="row">
											<div class="col-md-2">
												<i class="fa fa-3x fa-exclamation text-danger"></i>
											</div>
											<div class="col-md-10">
												 <p class="help-block error text-danger" >Usted aún no se encuentra asignado a un operativo activo. Próximamente estará disponible esa información.</p>
											</div>
											
											<div class="col-md-10">
												<p class="m-t-2">El DNI usado para la consulta es {{ $dni }} </p>
												<a type="button" class="btn btn-link" href="{{ route('personas.formulario') }}">HACE OTRA CONSULTA</a>
											</div>
											<div class="row">
												<div class="col-md-12">
													<hr>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<p class="text-justify" style="font-size: 15px; color: #555555;">Los datos son suministrados por el Ministerio de Desarrollo Social de la Nación.</p>
												</div>
											</div>
										</div>
									</section>
								</fieldset>
								@else
								<fieldset>
									<legend class="m-b-2">
										<h3>Retirá tu tarjeta en este lugar</h3>
									</legend>
									
									<section class="bg-white p-x-3">
										<h5>{{$datas->Operativo->first()->nombre }}</h5>
										<div class="row">
											<div class="col-md-12"></div>
											<div class="col-md-2">
												<i class="fa fa-3x icono-arg-marcador-ubicacion-2 text-primary"></i>
											</div>
											<div class="col-md-10">
												<h6 class="m-t-2"> {{$datas->Operativo->first()->Geos->first()->calle }} {{$datas->Operativo->first()->Geos->first()->numero }} 
												</h6>
												<p>{{ $datas->Operativo->first()->Geos->first()->provincia }} - {{$datas->Operativo->first()->Geos->first()->municipio }} - {{$datas->Operativo->first()->Geos->first()->localidad }}</p>
												<p>Operativo: {{ $datas->Operativo->first()->nombre }} </p>
											</div>
											<div class="col-md-2">
												<i class="fa fa-3x fa-clock-o text-primary"></i>
											</div>
											<div class="col-md-10">
												<h6 class="m-t-2">Día y Horarios</h6>
												<p>
												@if($datas->Tarjeta->first()->retiro_fecha == "" || $datas->Tarjeta->first()->retiro_hora == "")
	                                                A definir
	                                        	@else
	                                            	{{$datas->Tarjeta->first()->retiro_fecha }} {{$datas->Tarjeta->first()->retiro_hora }}
	                                        	@endif
												</p>
											</div>
											<div class="col-md-10">
												<p class="m-t-2">El DNI usado para la consulta es {{ $datas->nro_documento }} </p>
												<a type="button" class="btn btn-link" href="{{ route('personas.formulario') }}">HACE OTRA CONSULTA</a>
											</div>
											<div class="row">
												<div class="col-md-12">
													<hr>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<p class="text-justify" style="font-size: 15px; color: #555555;">Los datos son suministrados por el Ministerio de Desarrollo Social de la Nación.</p>
												</div>
											</div>
										</div>
									</section>
									
									{{--
									<section class="bg-white p-x-3">
										<h5></h5>
										<div class="row">
											<div class="col-md-12"></div>
											<div class="col-md-2">
												<i class="fa fa-3x icono-arg-marcador-ubicacion-2 text-primary"></i>
											</div>
											<div class="col-md-10">
												<h6 class="m-t-2"> {{ $datas->calle }} {{ $datas->numero }} 
												</h6>
												<p>{{ $datas->provincia }}  - {{ $datas->municipio }} - {{ $datas->localidad }}</p>
												<p>Operativo: {{ $datas->nombre_operativo }} </p>
											</div>
											<div class="col-md-2">
												<i class="fa fa-3x fa-clock-o text-primary"></i>
											</div>
											<div class="col-md-10">
												<h6 class="m-t-2">Día y Horarios</h6>
												<p>
												@if($datas->operativo_dia == "" || $datas->operativo_horario == "")
	                                                A definir
	                                        	@else
	                                            	{{ $datas->operativo_dia }} {{$datas->operativo_horario }}
	                                        	@endif
												</p>
											</div>
											<div class="col-md-10">
												<p class="m-t-2">El DNI usado para la consulta es {{ $datas->nro_doc }} </p>
												<a type="button" class="btn btn-link" href="{{ route('personas.formulario') }}">HACE OTRA CONSULTA</a>
											</div>
											<div class="row">
												<div class="col-md-12">
													<hr>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<p class="text-justify" style="font-size: 15px; color: #555555;">Los datos son suministrados por el Ministerio de Desarrollo Social de la Nación.</p>
												</div>
											</div>
										</div>
									</section>
									--}}
								</fieldset>
								@endif
		                      	
							@else

							<label for="numDoc" id="mostrar-tipo">Numero de DNI</label>
							{!! Form::open(['route'=> 'personas.postFormulario', 'method' => 'post' ]) !!}
							<div class="row">

								<div class="col-md-8">
									{!! Form::number('buscar',null,['class'=>'form-control', 'minlength'=>'5']) !!}
									<input type="hidden" name="recaptcha_response" id="recaptchaResponse">
									<p class="help-block">Sin guiones ni barras</p>
									<p class="help-block error hidden">Ingresá tu número de documento</p>
								</div>

								<div class="col-md-4">
									  <button type="submit" disabled id="buscador" class="btn btn-primary btn-block">Buscar</button>
								
								</div>
							</div>
							{!! Form::close() !!}
							<p class="help-block error hidden">Ingresá una palabra para buscar</p>
							<div class="row">
								<div class="col-md-12">
									<hr>
								</div>
							</div>

							@endif
							<div class="row">
								<div class="col-md-12">
									<div class="panel-pane pane-area-contacto">
										<div class="pane-content">
											<h5>Redes sociales de Desarrollo Social</h5>
											<div class="social-share">
												<ul class="list-inline">
													<li>
														<a href="http://www.facebook.com/MDSNacion" target="_blank">
															<span class="sr-only">Facebook</span>
															<i class="fa fa-facebook" aria-hidden="true"></i>
														</a>
													</li>
													<li>
														<a href="http://www.twitter.com/MDSNacion" target="_blank">
															<span class="sr-only">Twitter</span>
															<i class="fa fa-twitter" aria-hidden="true"></i>
														</a>
													</li>
													<li>
														<a href="http://www.youtube.com//user/DesarrolloSocialTV" target="_blank">
															<span class="sr-only">Youtube</span>
															<i class="fa fa-youtube" aria-hidden="true"></i>
														</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</section>
	</main>

	<footer class="main-footer">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<a class="navbar-brand" href="#" aria-label="Argentina.gob.ar Presidencia de la Nación">
						<img alt="Argentina Unida" 
						
						@if (env('APP_ENV') == 'local')
							src="{{asset('miargentina/img/logo_argentina_unida.svg')}}" 
						@else
							src="{{secure_asset('miargentina/img/logo_argentina_unida.svg')}}" 
						@endif

						
						
						width="90%">
					</a>
				</div>
			</div>
		</div>
	</footer>
	
	<script>
		function viewpassword(){
			var clave = document.getElementById('password_confirmacion')
			if(clave.type === 'password'){
				clave.type = 'text'
				document.getElementById('eye-password').classList.remove("fa-eye-slash")
				document.getElementById('eye-password').classList.add("fa-eye")
			}else{
				clave.type = 'password'
				document.getElementById('eye-password').classList.remove("fa-eye")
				document.getElementById('eye-password').classList.add("fa-eye-slash")
			}

		}
	</script>
	@if (env('APP_ENV') == 'local')
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
	@else
	    <script src="{{ secure_asset('plugins/jquery/jquery.min.js') }}"></script>
	@endif
	<script>
	$(document).ready(function () {
	        $('#buscador').removeAttr('disabled');
	});
	</script>
</body>
</html>
