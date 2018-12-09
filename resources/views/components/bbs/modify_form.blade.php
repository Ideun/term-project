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
	<form action="{{route('boards.update',$msg)}}" method="post">
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
			name="content" class="summernote" required> {!! $msg["content"] !!}
			</textarea>
			<br>
			<button type="submit" 
				class="btn btn-primary">수정</button>

		</div>		
	</form>

		<script>
            $(document).ready(function() {
                $('.summernote').summernote();
            });
            $(function (){
                $('.summernote').summernote({
                    height:350,
                    minHeight:null, // key:value
                    maxHeight:null,
                    focus:true,
                    placeholder:"here",
                    callbacks:{
                        onImageUpload:function(image){
                            editor=$(this);
                            uploadImageContent(image[0],editor);

                        }
                    }
                });
                function uploadImageContent(image,editor){
                    var data = new FormData();
                    data.append("image",image);

                    $.ajax({
                        data:data,
                        type:"post",
                        url:"./imageUpload.php",
                        cache:false,
                        contentType:false, //지정안함
                        processData:false,
                        success: function(){	//실행 성공 했을 때 실행할 함수 선언
                            var image=$("<img>").attr("src",url);
                            $(editor).summernote("insertNode",img[0]);
                        },
                        error:function(data){
                            console.log(data); // 에러 볼 수 있음
                        }
                    });
                }

            }); // onload함수 -> 페이지가 나올 때 이 자바스크립트 실행
		</script>
</div>

</body>
</html>