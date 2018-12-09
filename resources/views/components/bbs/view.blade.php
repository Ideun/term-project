<!DOCTYPE html>
<html lang="en">
<head>
  <title>TITLE</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="UTF-8">
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
    
    <div class="form-group">
      <label for="title">제목: </label>
      <input type="text" id="title" class="form-control" value="{{$msg["title"]}}" readonly>
    </div>
  
    <div class="form-group">
      <label for="id">작성자: </label>
      <input type="text" id="writer" class="form-control" value="{{$msg["writer"]}}" readonly>
    </div>

    <div class="form-group">
      <label for="created_at">작성일자: </label>
      <input type="text" id="created_at" class="form-control" value="{{$msg["created_at"]}}" readonly>
    </div>

    <div class="form-group">
      <label for="hits">조회수: </label>
      <input type="text" id="hits" class="form-control" value="{{$msg["hits"]}}" readonly>
    </div>

    <div class="form-group">
      <label for="content">내용:</label>
      {!! $msg["content"] !!}
    </div>



    <!-- 여기까지라구 -->
    <button class="btn btn-warning"
    onclick="location.href='{{route('boards.edit', ['id'=>$msg['id']])}}'">수정</button>

    <span>
      <!-- delete랑 put은 꼭 폼태그안에 넣어주고 메소드 설정해주저ㅏ
       -->
      <form action="{{route('boards.destroy',['id'=>$msg['id']])}}" method="post">
        @method('delete')
        @csrf
        <button class="btn btn-warning" type="submit">삭제</button>
      </form>
    </span>
    <a class="btn btn-warning" href="{{route('boards.index',['page'=>$page])}}">목록보기 </a>
  </div>

  </div>





</div>


</body>
</html>