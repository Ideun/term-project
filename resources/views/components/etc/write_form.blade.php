<!DOCTYPE html>
<html lang="en">
<head>
    <title>TITLE</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
@section('headJs')

@endsection

<!-- include libraries(jQuery, bootstrap) -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

    <!-- include summernote css/js -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

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
    <form action="{{route('boards.store')}}"  method="post">
        @csrf
        <div class="form-group" align="left">
            <label for="title">제목: </label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="content">내용: </label>
            <textarea class="summernote" name="content" rows="8"></textarea>
            <button type="submit" class="btn btn-warning">글등록</button>
            <a class="btn btn-warning" href="{{route('boards.index',['page'=>1])}}">목록보기</a>
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