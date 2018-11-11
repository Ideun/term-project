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
  <link href="/term2/css/bootstrap.css" rel="stylesheet">
  <link href="/term2/css/ionicons.css" rel="stylesheet">
  <link href="/term2/css/layerslider.css" rel="stylesheet">

  <link href="/term2/css/css/styles.css" rel="stylesheet">
  <link href="/term2/css/css/responsive.css" rel="stylesheet">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>			

</head>
<body>
	<header>
    <?php require_once("../header.php") ?>
  </header>
  <br>
  <br>
  <br>
	<?php
		require_once("BoardDAO2.php");
		require_once("../tools.php")	;
		
		$num = requestValue("num");	
		$page = requestValue("page");
		$dao = new BoardDao();
		$msg = $dao->getMsg($num);
	?>


	<div class="jumbotron">
	</div>
	<br><br><br>

	<div class="container">
	<form action="modify2.php" method="post">
		<input type="text" name="num" 
		value="<?= $msg["Num"] ?>" readonly
		hidden>
		<div class="form-group">
			<label for="title">제목: </label>
			<input type="text" id="title" name="title" class="form-control" value="<?= $msg["Title"] ?>"
			required>
		</div>
		
		<div class="form-group">
			<label for="writer">작성자: </label>
			<input type="text" id="writer" name="writer" class="form-control" value="<?= $msg["Writer"] ?>"
			 required>
		</div>
		
		<div class="form-group">
			<label for="content">내용: </label>
			<textarea rows="5" id="content"
			name="content" class="form-control" required> <?= $msg["Content"] ?>
			</textarea>
			<br>
			<button type="submit" 
				class="btn btn-primary">수정</button>	
			<button type="button" onclick="location.href='board2.php?page=<?= $page ?>'" class="btn btn-danger">목록보기</button>
		</div>		
	</form>		
</div>
  <script src="/term2/js/jquery-3.1.1.min.js"></script>

  <script src="/term2/js/tether.min.js"></script>

  <script src="/term2/js/bootstrap.js"></script>

  <script src="/term2/js/layerslider.js"></script>

  <script src="/term2/js/scripts.js"></script>
</body>
</html>