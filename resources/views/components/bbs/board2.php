<?php
       // https://www.w3schools.com/bootstrap4/bootstrap_pagination.asp
require_once("BoardDao2.php");
    require_once("../tools.php");
  $dao = new BoardDao();
  $dao->increaseHits($num);
  $msg = $dao->getMsg($num);
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


</head>
<body>
  <header>
    <?php require_once("../header.php") ?>
  </header>



<div class="jumbotron"> 
  
</div>
<br>
<div class="container"> 
  <table class="table table-hover">
    <tr>
      <th>번호</th> 
      <th>제목</th>
      <th>작성자</th>
      <th>작성일시</th>
      <th>조회수</th>
    </tr>
  <?php

    

    $page = requestValue("page");
    if($page <1)
      $page = 1; // 278p24줄 밑 설명

    $dao = new BoardDao();
    $startRecord = ($page-1)*10;
    //$msgs = $dao->getManyMsgs();
    $msgs = $dao->getPageMsgs($startRecord, 10);
  ?> 
  <?php foreach($msgs as $msg) : ?>
    <tr align="center">
      
      <td><?= $msg["Num"] ?> </td>          
      <td><a href="view2.php?num=<?= $msg["Num"]?>&page=<?= $page ?>"> <?= $msg["Title"] ?> </a> </td>
      <td><?= $msg["Writer"] ?> </td>
      <td><?= $msg["Regtime"] ?> </td>
      <td><?= $msg["Hits"] ?> </td>
    </tr>
  <?php endforeach ?> 
  </table>  
</div>

<?php
  $numPageLinks = 3;//한 페이지에 출력할 페이지 링크 수
  $numMsgs = 10; // 한 페이지에 출력할 게시글 수-num_lines
  $startPage = floor(($page-1)/$numPageLinks)*$numPageLinks+1;
  $endPage = $startPage + ($numPageLinks-1);
  $count = $dao->getTotalCount();//전체 게시글 수-numMsgs
  $totalPages = ceil($count/$numMsgs);
  if($endPage > $totalPages)
    $endPage = $totalPages;

?>

<ul class="pagination justify-content-center">
<?php if($startPage >1) :?>
    <li class="page-item"><a class="page-link" href="board2.php?page=<?= $startPage- $numPageLinks ?>">&lt;</a></li>
<?php endif ?>

<?php for($i=$startPage; $i <= $endPage; $i++) : ?>
    <?php if($i == $page) :?>
      <li class="page-item active"><a class="page-link" href="board2.php?page=<?= $i ?>">
<b>
        <?= $i ?></b></a></li>
        
    <?php else :?>
      <li class="page-item"><a class="page-link" href="board2.php?page=<?= $i ?>"><?= $i ?></a></li>
      
    <?php endif ?>
   
<?php endfor ?>

<?php if($endPage < $totalPages) :?>
  <li class="page-item"><a class="page-link" href="board2.php?page= <?= $endPage+1 ?>">&gt;</a></li>
<!-- $endPage+1 = $startPage + $numPageLinks -->
<?php endif ?>
</ul>


<!-- 검색창 구현하기 -->

<?php
   
    $loginFlag = isLogin();
    $Writer = $msg["Writer"];
    $myArticle = isMyArticle($msg["Writer"]); // 쓴 사용자 이름은 ~~다 -> 함수 내에서 로그인 한 사용자 이름과 비교
    

    if($loginFlag && $myArticle){  ?>
      <div class="float-right" style="margin-right:205px"> 
  <button class="btn btn-outline-warning" onclick="location.href='write_form2.php'">글쓰기</button>
</div>
    

  </div>

  
  <?php } ?>



<!-- SCRIPTS -->

  <script src="/term2/js/jquery-3.1.1.min.js"></script>

  <script src="/term2/js/tether.min.js"></script>

  <script src="/term2/js/bootstrap.js"></script>

  <script src="/term2/js/layerslider.js"></script>

  <script src="/term2/js/scripts.js"></script>
</body>
</html>