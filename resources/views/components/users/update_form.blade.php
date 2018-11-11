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
    <header>
    @yield('header')
  </header>


  <div class="jumbotron">
    
  </div>
  
 <br><br><br> <br><br><br>

    <div class="container">
  <h3>회원정보수정</h3>
  <p>회원정보 수정을 위해 아래의 정보를 작성해 주세요.</p>
  <br>
  <form action="{{url('update')}}" method="post">
    @csrf
    <div class="form-group">
          <label for="id">Id:</label> <!-- 어떤 태그를 위한 네임인지 -->
          <input type="text" class="form-control" readonly
			value="{{$member["email"]}}" 
           id="usr" name="email">
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" id="pwd" name="password" value="{{($member["password"])}}">
        </div>
        <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" id="name" name="name" value="<?= $member["name"] ?>">
            </div> <!-- decrypt -->
        <button type="submit" class="btn btn-primary">Submit</button> <!--클래스는 여러개 가질 수 있음. 라벨 안에다 인풋을 넣어도 됨-->

      </form>
    </div>
    <script src="/term2/js/jquery-3.1.1.min.js"></script>

  <script src="/term2/js/tether.min.js"></script>

  <script src="/term2/js/bootstrap.js"></script>

  <script src="/term2/js/layerslider.js"></script>

  <script src="/term2/js/scripts.js"></script>
  </body>
</html>