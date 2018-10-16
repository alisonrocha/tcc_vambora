<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<!--ARQUIVO JQUERY 3.3.1-->
   
	<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
	<link rel="icon" type="imagem/png" href="/img/trip.png" />
	<title>Vambora!</title>
</head>
<body>
	@yield('conteudo')
		<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
		<!--ARQUIVO JQUERY MASK-->
		<script type="text/javascript" src="../js/jquery-mask/src/jquery.mask.js"></script>
		<!--ARQUIVO JQUERY VALIDATE-->
		<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
	@yield('scripts')
	@yield('content')
</body>
</html>
