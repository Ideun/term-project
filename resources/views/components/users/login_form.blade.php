	
<!DOCTYPE html>
<html lang="en">
<head>
	<title>TITLE</title>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">

	<script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>
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
@extends('index')

@section('header')
	@include('components.header')
@endsection

<div class="jumbotron">

</div>

<br><br><br> <br><br><br>

<div class="container">
	<h3>로그인</h3>
	<p>아래의 칸을 작성해 주세요.</p>
	<br>
		<form action="{{route('login')}}" method="post">
			@csrf
				<div class="form-group">
			Email : <input type="text" class="form-control" name="email">
		</div>
		<div class="form-group">
			Pw : <input type="password" class="form-control" name="password">
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-primary" value="Login">
		</div>
			</form>

	<a id="kakao-login-btn"></a>
	<a href="http://developers.kakao.com/logout"></a>
	<script type='text/javascript'>
        Kakao.init('080af1523dd0189ca3818a631e92403c');
        Kakao.Auth.createLoginButton({
            container: '#kakao-login-btn',
            success: function(authObj) {
                location.href="{{url('kakao/login')}}"
            },
            fail: function(err) {
                alert(JSON.stringify(err));
            }
        });
	</script>
</div>


</body>
</html>