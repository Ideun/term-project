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
            </tr>

            @foreach($msgs as $msg)
                <tr align="center">

                    <td>{{$msg["id"]}} </td>
                    <td><a href="{{route('reboards.show', ['id'=>$msg["id"],'page'=>$page])}}"> {{$msg["title"]}} </a> </td>
                    <td>{{$msg["writer"]}} </td>
                    <td>{{$msg["created_at"]}} </td>
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
                    {{$msgs->links()}}
                </div>
            </div>
        </div>
    </div>

    <br>

    @if(\Auth::user()->name== 'manager')
    <div class="float-right" style="margin-right:205px">
        <button class="btn btn-outline-warning" onclick="location.href='{{route('reboards.create')}}'">글쓰기</button>

    </div>
    @endif

@endsection