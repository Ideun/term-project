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

<div class="jumbotron">
    
  </div>

 <br><br><br> <br><br><br>

	<?php
		require_once("../tools.php");
		session_start_if_none();

		
		
			
		if(isset($_SESSION["name"])){
			?>
			<div class="welcome" align="center">
				<?php
			echo "<h3>", $_SESSION["name"], "회원님 환영합니다!</h3>";

	


	?>
	</div><br>
	<div class="welcome" align="center">
	<input type="button" class="btn btn-primary" value="logout" onclick="location.href='logout.php'">
	<input type="button" class="btn btn-primary" value="update" onclick="location.href='update_form.php'">
	</div>
	<?php
		}
		else{

	?>
	<div class="container">
		<h3>로그인</h3>
		<p>아이디와 비밀번호를 입력해주세요.</p>
		<br>
	<form action="/term2/member/login.php" method="post">
				<div class="form-group">
			<label for="id">Id:</label><input type="text" class="form-control" name="id">
		</div>
		<div class="form-group">
			<label for="pwd">Password:</label> <input type="password" class="form-control" name="pw">
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-primary" value="login">
		</div>
	</form>
</div>
		<?php
}

?>
	<!-- 로그인 버튼 -->
		
<script src="/term2/js/jquery-3.1.1.min.js"></script>

	<script src="/term2/js/tether.min.js"></script>

	<script src="/term2/js/bootstrap.js"></script>

	<script src="/term2/js/layerslider.js"></script>

	<script src="/term2/js/scripts.js"></script>
</body>
</html>