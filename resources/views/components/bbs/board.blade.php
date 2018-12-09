@extends('index')

@section('headStyle')
  <style>
    a:hover {text-decoration: none};
    }
    button{
      border-radius: 0.2rem;
    }
    .pagination> li> a, .pagination> li> span {color : #ffad4d;}


    .pagination > .active > a,
    .pagination > .active > a:focus,
    .pagination > .active > a:hover,
    .pagination > .active > span,
    .pagination > .active > span:focus,
    .pagination > .active > span:hover { background-color: #ffad4d; border-color: white; }

.pagination > li > a:focus,
.pagination > li > a:hover,
.pagination > li > span:focus,
.pagination > li > span:hover {
    color: #ffad4d;
    background-color: #ffad4d;
    color: white;
    border-color: #ffad4d;
}

.page-item.active .page-link{
  background-color: #ffad4d;
  border-color: #ffad4d;
}
  </style>


@section('header')
  @include('components.header')
@endsection

@section('content')
<div class="jumbotron">

</div>

<br><br><br> <br><br>

<div class="container"> 
  <table class="table table-hover">
    <tr>
      <th>번호</th> 
      <th>제목</th>
      <th>작성자</th>
      <th>작성일시</th>
      <th>조회수</th>
    </tr>

  @foreach($msgs as $msg)
    <tr align="center">
      
      <td>{{$msg["id"]}} </td>
      <td><a href="{{route('boards.show', ['id'=>$msg["id"],'page'=>$page])}}"> {{$msg["title"]}} </a> </td>
      <td>{{$msg["writer"]}} </td>
      <td>{{$msg["created_at"]}} </td>
      <td>{{$msg["hits"]}} </td>
    </tr>
  @endforeach
  </table>

  <br>
  <!-- 페이지네이션 -->
  <div class="pagination justify-content-center">
  <div>
    <div class="col-5">
    </div>
    <div class="col-5">
      {{$msgs->appends(['search'=>$search,'state'=>$state])->links()}}
    </div>
  </div>
  </div>
  <select class="custom-select" id="inputState" name="state">
    <option value="title">제목</option>
    <option value="content">글내용</option>
    <option value="titlencontent">제목+글내용</option>
    <option value="writer">작성자</option>
  </select>
  <input class="form-control" type="search" name="search" id="inputText" placeholder="search" aria-label="Search">

</div>

<br>



<div class="float-right" style="margin-right:205px">
  <button class="btn btn-outline-warning" type="button" onclick="searchBtn({{$page}})">검색</button>

  <button class="btn btn-outline-warning" onclick="location.href='{{route('boards.create')}}'">글쓰기</button>

</div>
@endsection

  <script>

      function searchBtn(page) {
          var searchValue = document.getElementById('inputState').value;
          var search = document.getElementById('inputText').value;
          page = 1;
          var url = 'boards?search=' + search + '&state=' + searchValue + '&page=' + page;

          location.href = url;
      }
  </script>