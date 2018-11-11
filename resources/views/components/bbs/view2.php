<?php
       // https://www.w3schools.com/bootstrap4/bootstrap_pagination.asp
  require_once("../tools.php");
  require_once("BoardDAO2.php");
  $num = requestValue("num");
  $page = requestValue("page");
  $dao = new BoardDao();
  $dao->increaseHits($num);
  $msg = $dao->getMsg($num);

    require("WebhardDAO.php");
    $dao = new WebhardDao();
    
    $sort = isset($_REQUEST["sort"]) ? $_REQUEST["sort"] : "fname";
    $dir  = isset($_REQUEST["dir"])  ? $_REQUEST["dir"]  : "asc";

    $result = $dao->getFileList($sort, $dir);

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
  <style>
        table  { width: 700px; text-align: center; }
        th     { background-color:  #ffad4d; }
        
        .left  { text-align: left;  }        
        .right { text-align: right; }

        a:hover { text-decoration: none; color: red;  }
   
</style>
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
  <br><br>
  <div class="form-group">
      <label for="file">첨부파일: </label><br>
      <form action="add_file.php?sort=<?= $sort ?>&dir=<?= $dir ?>" 
      enctype="multipart/form-data" method="post">
    <input type="file" name="upload">
    <input type="submit" value="업로드">
</form>
<br>

<table>
    <tr>
        <th>파일명
            <!--
            <a href="?sort=fname&dir=asc">^</a>
            <a href="?sort=fname&dir=desc">v</a>  
            -->          
        </th>
        <th>업로드
          <!--
            <a href="?sort=ftime&dir=asc">^</a>
            <a href="?sort=ftime&dir=desc">v</a>  
            -->          
        </th>
        <th>크기</th>
        <th>삭제</th>
    </tr>
    <?php foreach ($result as $row) : ?>
    <tr>
        <td class="left"><a href="files/<?= $row["fname"] ?>">
                                  <?= $row["fname"] ?></a></td>
        <td><?= $row["ftime"] ?></td>
        <td class="right"><?= $row["fsize"] ?>&nbsp;&nbsp;</td>
        <td><a href="del_file.php?num=<?= $row["num"] ?>&sort=<?= 
                     $sort ?>&dir=<?= $dir ?>">X</td>
    </tr>
    <?php endforeach ?>
</table>
    </div>

  <div class="form-group">
  </div>
    <button onclick="location.href='board2.php?page=<?= $page ?>'" type="submit" class="btn btn-primary">목록보기</button> 


 
    <?php
   
    $loginFlag = isLogin();
    $Writer = $msg["Writer"];
    $myArticle = isMyArticle($msg["Writer"]); // 쓴 사용자 이름은 ~~다 -> 함수 내에서 로그인 한 사용자 이름과 비교
    

    if($loginFlag && $myArticle){  ?>
    <button class="btn btn-warning"
    onclick="location.href='modify_form2.php?num=<?= $msg["Num"] ?>'">수정</button>
    <button type="submit" 
      onclick="processDelete(<?= $msg["Num"] ?>)"
    class="btn btn-danger">삭제하기</button>

  </div>

  
  <?php } ?>
   

    
    


    <script src="/term2/js/jquery-3.1.1.min.js"></script>

  <script src="/term2/js/tether.min.js"></script>

  <script src="/term2/js/bootstrap.js"></script>

  <script src="/term2/js/layerslider.js"></script>

  <script src="/term2/js/scripts.js"></script>
</body>
</html>