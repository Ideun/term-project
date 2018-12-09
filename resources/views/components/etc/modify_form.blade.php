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

	<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
	<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

	<link href="/term2/css/css/styles2.css" rel="stylesheet">

</head>
<body>
@extends('index')

@section('header')
	@include('components.header')
@endsection




	<div class="jumbotron">
	</div>
	<br><br><br><br><br><br>

	<div class="container">
		<h3>글 수정</h3>
		<p>게시글을 수정합니다.</p>
		<br>
	<form action="{{route('reboards.update',$msg)}}" method="post">
		@Method('PUT')
		@csrf
		<input type="text" name="id"
		value="<?= $msg["id"] ?>" readonly
		hidden>
		<div class="form-group">
			<label for="title">제목: </label>
			<input type="text" id="title" name="title" class="form-control" value="<?= $msg["title"] ?>"
			required>
		</div>


		<div class="form-group">
			<label for="writer">작성자: </label>
			<input type="text" id="writer" name="writer" class="form-control" value="{{$msg["writer"]}}"
			 required readonly>
		</div>


		<div class="form-group">
			<label for="content">내용: </label>
			<textarea rows="5" id="content"
			name="content" required> {!! $msg["content"] !!}
			</textarea>
			<br>
			<button type="submit" 
				class="btn btn-primary">수정</button>

		</div>		
	</form>

</div>

</body>
</html>