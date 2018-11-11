	
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

</head>
<body>
	<header>
		@yield('header')
	</header>


	<div class="main-slider">
		<div id="slider">
			@yield('slider')
		</div><!-- slider -->
	</div><!-- main-slider -->



		<form action="{{route('login')}}" method="post">
			@csrf
				<div class="form-group">
			아이디 : <input type="text" class="form-control" name="email">
		</div>
		<div class="form-group">
			암호 : <input type="password" class="form-control" name="password">
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-primary" value="로그인">
		</div>
			</form>



</body>
</html>