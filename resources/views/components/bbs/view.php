<?php
       // https://www.w3schools.com/bootstrap4/bootstrap_pagination.asp
/*
  require_once("../tools.php");
  require_once("BoardDao.php");
  require_once("../member/MemberDao.php");
  session_start();
  $num = requestValue("num");
  $page = requestValue("page");
  $dao = new BoardDao();
  $dao->increaseHits($num);
  $msg = $dao->getMsg($num);
  
  $uid=$_SESSION["uid"];
  $mdao=new MemberDao();
$member=$mdao->getMember($uid);
*/
  
?>
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

  <script>
    function processDelete(num) {
      result = confirm("Are you sure?");
      if(result) {
        location.href="delete.php?num="+num;
      }
    }
  </script>
</head>

<body>
  <header>
    <?php require_once("../header.php") ?>
  </header>

 
  <div class="jumbotron">
  </div>
  <br><br><br><br><br><br>

  <div class="container">
    
  <div class="form-group">
    <label for="title">제목: </label>
    <input type="text" id="title" class="form-control" value="<?=$msg["Title"] ?>" >
  </div>
  
  <div class="form-group">
    <label for="writer">작성자: </label>
    <input type="text" id="writer" class="form-control" value="<?=$msg["Writer"] ?>" >
  </div>

  <div class="form-group">
    <label for="regtime">작성일자: </label>
    <input type="text" id="regtime" class="form-control" value="<?=$msg["Regtime"] ?>" readonly>
  </div>


  <div class="form-group">
    <label for="hits">조회수: </label>
    <input type="text" id="hits" class="form-control" value="<?=$msg["Hits"] ?>" readonly>
  </div>


  
  <div class="form-group">
    <label for="content">내용:</label>
    <?=$msg["Content"]?>
  </div>


  <div class="form-group">
  </div>
    <button onclick="location.href='board.php?page=<?= $page ?>'" type="submit" class="btn btn-primary">목록보기</button> 


 
    <?php
   
    $loginFlag = isLogin();
    $Writer = $msg["Writer"];
    $myArticle = isMyArticle($msg["Writer"]); // 쓴 사용자 이름은 ~~다 -> 함수 내에서 로그인 한 사용자 이름과 비교
    

    if($loginFlag && $myArticle){  ?>
    <button class="btn btn-warning"
    onclick="location.href='modify_form.php?num=<?= $msg["Num"] ?>'">수정</button>
    <button type="submit" 
      onclick="processDelete(<?= $msg["Num"] ?>)"
    class="btn btn-danger">삭제하기</button>

  <!--
    <div class="float-right" > 
  <button class="btn btn-outline-warning"
  onclick="location.href='rec.php'">추천</button>
  </div>
-->
  </div>

  
  <?php } ?>
   

<div class="mx-5 mb-5">
    <form action="comment_result.php?num=<?=$num?>&page=<?=$page?>" method="post" class="form-inline">
        <div class="form-group">
            <input type="text" class="form-control-plaintext" id="writer" name="writer" value="<?= $member["name"] ?>" readonly>
        </div>
        <div class="form-group">
            <textarea class="form-control" name="comment" cols="80" rows="2"></textarea>

            <a href="view.php?num=<?=$num?>&page=<?=$page?>"><input type="submit" class="btn btn-primary ml-3" value="댓글등록"></a>
        </div>
        <?php
        require_once("comment.php");
        ?>
     </form>
</div>

    
    


    <script src="/term2/js/jquery-3.1.1.min.js"></script>

  <script src="/term2/js/tether.min.js"></script>

  <script src="/term2/js/bootstrap.js"></script>

  <script src="/term2/js/layerslider.js"></script>

  <script src="/term2/js/scripts.js"></script>
</body>
</html>