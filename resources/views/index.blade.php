
<!DOCTYPE html>
<html lang="en">
<head>
	<title>TITLE</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">


	<!-- Font -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">

	<!-- Stylesheets -->
	<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
	<link href="{{asset('css/ionicons.css')}}" rel="stylesheet">
	<link href="{{asset('css/layerslider.css')}}" rel="stylesheet">

	<link href="{{asset('css/css/styles.css')}}" rel="stylesheet">
	<link href="{{asset('css/css/responsive.css')}}" rel="stylesheet">
	@yield('headJs')
	@yield('headStyle')
	@yield('css')
	@yield('cssNscript')
</head>
<body>
	<header>
		@yield('header')
	</header>
	@yield('content')

	<div class="main-slider">
		<div id="slider">
			@yield('slider')
		</div><!-- slider -->
	</div><!-- main-slider -->


<!-- SCRIPTS -->

	<script src="js/jquery-3.1.1.min.js"></script>

	<script src="js/tether.min.js"></script>

	<script src="js/bootstrap.js"></script>

	<script src="js/layerslider.js"></script>

	<script src="js/scripts.js"></script>
</body>
</html>