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


    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
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
    <h3>비밀번호수정</h3><br>
    <p>새로운 비밀번호를 입력해주세요.</p>
    <br>
<form action="{{url('passwordre')}}" method="post">
    @csrf
<div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="password" placeholder="new password">
    <!-- decrypt -->


</div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

</body>
</html>